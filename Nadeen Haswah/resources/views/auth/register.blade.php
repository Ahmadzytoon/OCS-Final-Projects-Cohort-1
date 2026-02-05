{{-- @extends('site.loging.layout.mater') --}}
@extends('site.layout.mater')

@section('css')
    <style>
        #other-industry-container {
            opacity: 0;
            transform: translateY(-10px);
            transition: all 0.3s ease;
        }

        #other-industry-container.show {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        #other-industry {
            border-left: 3px solid #47b2e4;
        }

        #other-industry:focus {
            border-left-color: #5bc0de;
            box-shadow: 0 0 0 0.2rem rgba(71, 178, 228, 0.25);
        }
    </style>
@endsection
@section('content_forms')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">Create Your Workspace</h3>
                    </div>
                    <div class="card-body p-4">
                        {{-- Error Messages --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('workspace.store') }}" method="POST">
                            @csrf

                            {{-- Section 1: Workspace Info --}}
                            <div class="form-section mb-4">
                                <h4 class="mb-3">Workspace Information</h4>

                                <div class="mb-3">
                                    <label for="workspace-name" class="form-label">Workspace Name *</label>
                                    <input type="text" class="form-control @error('workspace_name') is-invalid @enderror"
                                        id="workspace-name" name="workspace_name" value="{{ old('workspace_name') }}"
                                        placeholder="e.g. Acme Corporation" required>
                                    @error('workspace_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Section 2: Company Admin --}}
                            <div class="form-section mb-4">
                                <h4 class="mb-3">Company Admin</h4>

                                <div class="mb-3">
                                    <label for="admin-name" class="form-label">Admin Name *</label>
                                    <input type="text" class="form-control @error('admin_name') is-invalid @enderror"
                                        id="admin-name" name="admin_name" value="{{ old('admin_name') }}"
                                        placeholder="e.g. Ahmad Khaled" required>
                                    @error('admin_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="admin-email" class="form-label">Work Email *</label>
                                    <input type="email" class="form-control @error('admin_email') is-invalid @enderror"
                                        id="admin-email" name="admin_email" value="{{ old('admin_email') }}"
                                        placeholder="admin@company.com" required>
                                    @error('admin_email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="admin-password" class="form-label">Password *</label>
                                    <input type="password"
                                        class="form-control @error('admin_password') is-invalid @enderror"
                                        id="admin-password" name="admin_password" placeholder="••••••••" required>
                                    <div class="form-text">
                                        <ul class="mb-0">
                                            <li>At least 8 characters</li>
                                            <li>One number</li>
                                            <li>One special character</li>
                                        </ul>
                                    </div>
                                    @error('admin_password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="admin-password-confirmation" class="form-label">Confirm Password *</label>
                                    <input type="password" class="form-control" id="admin-password-confirmation"
                                        name="admin_password_confirmation" placeholder="••••••••" required>
                                </div>
                            </div>

                            {{-- Section 3: Optional Information --}}
                            <div class="form-section mb-4">
                                <h4 class="mb-3">Additional Information <span class="badge bg-secondary">Optional</span>
                                </h4>

                                <div class="mb-3">
                                    <label for="company-size" class="form-label">Company Size</label>
                                    <select class="form-select" id="company-size" name="company_size">
                                        <option value="">Select company size</option>
                                        <option value="1-10" {{ old('company_size') == '1-10' ? 'selected' : '' }}>1–10
                                            employees</option>
                                        <option value="11-50" {{ old('company_size') == '11-50' ? 'selected' : '' }}>11–50
                                            employees</option>
                                        <option value="51-200" {{ old('company_size') == '51-200' ? 'selected' : '' }}>
                                            51–200 employees</option>
                                        <option value="200+" {{ old('company_size') == '200+' ? 'selected' : '' }}>200+
                                            employees</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="industry" class="form-label">Industry</label>
                                    <select class="form-select @error('industry') is-invalid @enderror" id="industry"
                                        name="industry" onchange="toggleOtherIndustry(this)">
                                        <option value="">Select industry</option>
                                        <option value="it-software"
                                            {{ old('industry') == 'it-software' ? 'selected' : '' }}>IT / Software</option>
                                        <option value="accounting" {{ old('industry') == 'accounting' ? 'selected' : '' }}>
                                            Accounting / Finance</option>
                                        <option value="marketing" {{ old('industry') == 'marketing' ? 'selected' : '' }}>
                                            Marketing</option>
                                        <option value="hr" {{ old('industry') == 'hr' ? 'selected' : '' }}>HR</option>
                                        <option value="manufacturing"
                                            {{ old('industry') == 'manufacturing' ? 'selected' : '' }}>Manufacturing
                                        </option>
                                        <option value="other" {{ old('industry') == 'other' ? 'selected' : '' }}>Other
                                        </option>
                                    </select>
                                    @error('industry')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Other Industry Input --}}
                                <div class="mb-3" id="other-industry-container"
                                    style="display: {{ old('industry') == 'other' ? 'block' : 'none' }};">
                                    <label for="other-industry" class="form-label">Specify Industry *</label>
                                    <input type="text" class="form-control @error('other_industry') is-invalid @enderror"
                                        id="other-industry" name="other_industry" value="{{ old('other_industry') }}"
                                        placeholder="e.g. Healthcare, Education, Real Estate">
                                    @error('other_industry')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Section 4: Terms --}}
                            <div class="form-section mb-4">
                                <div class="form-check">
                                    <input class="form-check-input @error('terms') is-invalid @enderror" type="checkbox"
                                        id="terms" name="terms" value="1" required>
                                    <label class="form-check-label" for="terms">
                                        I agree to the <a href="#" target="_blank">Terms of Service</a> and
                                        <a href="#" target="_blank">Privacy Policy</a>
                                    </label>
                                    @error('terms')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg w-100">
                                <i class="fas fa-rocket me-2"></i> Create Workspace
                            </button>
                        </form>

                        <div class="text-center mt-3">
                            <p>Already have an account? <a href="#">Login here</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
