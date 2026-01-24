

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\Company\ProfileController;

Route::get('/dashboard', function () {
    return view('admin.index');
})->name('admin.index');

Route::get('/signup', [SignupController::class, 'show'])->name('signup');
Route::post('/signup', [SignupController::class, 'store'])->name('signup.store');

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.store');

Route::get('/companies', function () {
    return view('admin.companies');
})->name('admin.companies');

Route::get('/showCompany', function () {
    return view('admin.showCompany');
})->name('admin.showCompany');

Route::get('/users', function () {
    return view('admin.users');
})->name('admin.users');

Route::get('addUsers', function () {
    return view('admin.addUser');
})->name('admin.addUser');

Route::get('accessRequests', function () {
    return view('admin.accessRequests');
})->name('admin.accessRequests');

Route::get('departments', function () {
    return view('admin.departments');
})->name('admin.departments');


Route::get('addDepartment', function () {
    return view('admin.addDepartment');
})->name('admin.addDepartment');

Route::get('showDepartment', function () {
    return view('admin.showDepartment');
})->name('admin.showDepartment');

Route::get('editDepartment', function () {
    return view('admin.editDepartment');
})->name('admin.editDepartment');

Route::get('knowledgeItems', function () {
    return view('admin.knowledgeItems');
})->name('admin.knowledgeItems');

Route::get('showknowledgeItem', function () {
    return view('admin.showknowledgeItem');
})->name('admin.showknowledgeItem');

Route::get('editknowledgeItem', function () {
    return view('admin.editknowledgeItem');
})->name('admin.editknowledgeItem');

Route::get('plans', function () {
    return view('admin.plans');
})->name('admin.plans');

Route::get('addPlan', function () {
    return view('admin.addPlan');
})->name('admin.addPlan');

Route::get('editPlan', function () {
    return view('admin.editPlan');
})->name('admin.editPlan');

Route::get('subscriptions', function () {
    return view('admin.subscriptions');
})->name('admin.subscriptions');

Route::get('payments', function () {
    return view('admin.payments');
})->name('admin.payments');

Route::get('setting', function () {
    return view('admin.setting');
})->name('admin.setting');

Route::get('profile', function () {
    return view('admin.profile');
})->name('admin.profile');

Route::get('login', function () {
    return view('site.loging.login');
})->name('site.loging.login');


Route::get('signup', function () {
    return view('site.loging.signup');
})->name('site.loging.signup');

Route::get('access-request', function () {
    return view('site.loging.access-request');
})->name('site.loging.access-request');

Route::get('/', function () {
    return view('site.index');
})->name('site.index');

Route::get('solution', function () {
    return view('site.solution');
})->name('site.solution');


Route::get('knowledgeModel', function () {
    return view('site.knowledgeModel');
})->name('site.knowledgeModel');


Route::get('about', function () {
    return view('site.about');
})->name('site.about');

Route::get('faq', function () {
    return view('site.faq');
})->name('site.faq');


Route::get('choose', function () {
    return view('site.loging.choose');
})->name('site.loging.choose');

Route::middleware(['auth', 'role:company_owner'])->group(function () {
    Route::get('/company-owner/dashboard', function () {
        return view('site.innerPages.companyOwner.index');
    })->name('companyOwner.index');
});



Route::middleware(['auth', 'role:department_manager'])->group(function () {
    Route::get('/employee/dashboard', function () {
        return view('site.innerPages.DepartmentManager.index');
    });
});

Route::middleware(['auth', 'role:employe'])->group(function () {
    Route::get('/employee/dashboard', function () {
        return view('site.innerPages.employee.index');
    });
});


Route::middleware(['auth', 'company.owner'])
    ->group(function () {
        Route::put('/company/profile', [ProfileController::class, 'update'])
            ->name('company.profile.update');
    });

Route::get('plans', function () {
    return view('site.loging.plans.plans');
})->name('site.loging.plans.plans');


Route::get('companyOwnerDashboard', function () {
    return view('site.innerPages.companyOwner.index');
})->name('companyOwner.index');


Route::get('companyOwnerCompanyProfile', function () {
    return view('site.innerPages.companyOwner.companyProfile');
})->name('companyOwner.companyProfile');


Route::get('companyOwnerEmp', function () {
    return view('site.innerPages.companyOwner.employee');
})->name('companyOwner.employee');

Route::get('companyOwnerAccessRequests', function () {
    return view('site.innerPages.companyOwner.accessRequests');
})->name('companyOwner.accessRequests');

Route::get('companyOwnerrolesAndPermissions', function () {
    return view('site.innerPages.companyOwner.rolesAndPermissions');
})->name('companyOwner.rolesAndPermissions');

Route::get('companyOwnerDepartments', function () {
    return view('site.innerPages.companyOwner.departments');
})->name('companyOwner.departments');

Route::get('companyOwnerknowledgeOverview', function () {
    return view('site.innerPages.companyOwner.knowledgeOverview');
})->name('companyOwner.knowledgeOverview');

Route::get('companyOwneronboardingKnowledge', function () {
    return view('site.innerPages.companyOwner.onboardingKnowledge');
})->name('companyOwner.onboardingKnowledge');

Route::get('companyOwnerMistakesAndLessonsLearned', function () {
    return view('site.innerPages.companyOwner.MistakesAndLessonsLearned');
})->name('companyOwner.MistakesAndLessonsLearned');

Route::get('companyOwnerOperationalKnowledge', function () {
    return view('site.innerPages.companyOwner.OperationalKnowledge');
})->name('companyOwner.OperationalKnowledge');

Route::get('companyOwnerCriticalAndStrategicKnowledge', function () {
    return view('site.innerPages.companyOwner.CriticalAndStrategicKnowledge');
})->name('companyOwner.CriticalAndStrategicKnowledge');

Route::get('companyOwnerapprovals', function () {
    return view('site.innerPages.companyOwner.approvals');
})->name('companyOwner.approvals');

Route::get('companyOwnercompanyCalendar', function () {
    return view('site.innerPages.companyOwner.companyCalendar');
})->name('companyOwner.companyCalendar');

Route::get('companyOwnerdepartmentsCalendars', function () {
    return view('site.innerPages.companyOwner.departmentsCalendars');
})->name('companyOwner.departmentsCalendars');

Route::get('companyOwnercompanyNews', function () {
    return view('site.innerPages.companyOwner.companyNews');
})->name('companyOwner.companyNews');


Route::get('companyOwnersettings', function () {
    return view('site.innerPages.companyOwner.settings');
})->name('companyOwner.settings');


Route::get('companyOwnerprofile', function () {
    return view('site.innerPages.companyOwner.profile');
})->name('companyOwner.profile');


Route::get('DepartmentManagerDashboard', function () {
    return view('site.innerPages.DepartmentManager.index');
})->name('DepartmentManager.index');

Route::get('DepartmentdepartmentTeam', function () {
    return view('site.innerPages.DepartmentManager.departmentTeam');
})->name('DepartmentManager.departmentTeam');


Route::get('employeeDashboard', function () {
    return view('site.innerPages.employee.index');
})->name('employee.index');

Route::get('employeeaddknowledge', function () {
    return view('site.innerPages.employee.addknowledge');
})->name('employee.addknowledge');

Route::get('employeeadmyContributions', function () {
    return view('site.innerPages.employee.myContributions');
})->name('employee.myContributions');
