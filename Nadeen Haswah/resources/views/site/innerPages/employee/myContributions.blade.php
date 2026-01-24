@extends('site.innerPages.layout.master')


@section('content')
    <div class="content-header">
        <h1>Dashboard</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>
    <div class="content-body">
        <!-- Page Header -->
        <div class="contributions-header">
            <div class="header-content-contributions">
                <div>
                    <h1><i class="fas fa-file-alt me-3"></i>My Contributions</h1>
                    <p>Track and manage all your knowledge cards</p>
                </div>
                <button class="btn btn-primary btn-lg" onclick="window.location.href='/employee/add-knowledge'">
                    <i class="fas fa-plus-circle me-2"></i> Add New Card
                </button>
            </div>
        </div>

        <!-- Statistics Overview -->
        <div class="row g-4 mb-4">
            <div class="col-lg-3 col-md-6">
                <div class="contribution-stat-card total">
                    <div class="stat-icon-contrib">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <div class="stat-content-contrib">
                        <h3>28</h3>
                        <p>Total Cards</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="contribution-stat-card approved">
                    <div class="stat-icon-contrib">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stat-content-contrib">
                        <h3>22</h3>
                        <p>Approved</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="contribution-stat-card pending">
                    <div class="stat-icon-contrib">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stat-content-contrib">
                        <h3>6</h3>
                        <p>Pending Review</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="contribution-stat-card rejected">
                    <div class="stat-icon-contrib">
                        <i class="fas fa-times-circle"></i>
                    </div>
                    <div class="stat-content-contrib">
                        <h3>0</h3>
                        <p>Rejected</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters and Search -->
        <div class="content-card mb-4">
            <div class="card-body">
                <div class="filters-row">
                    <div class="search-box-contrib">
                        <i class="fas fa-search"></i>
                        <input type="text" class="form-control" id="searchInput"
                            placeholder="Search by title, content, or tags...">
                    </div>
                    <div class="filter-controls">
                        <select class="form-select" id="statusFilter" onchange="filterCards()">
                            <option value="all">All Status</option>
                            <option value="pending">Pending Review</option>
                            <option value="approved">Approved</option>
                            <option value="rejected">Rejected</option>
                        </select>
                        <select class="form-select" id="typeFilter" onchange="filterCards()">
                            <option value="all">All Types</option>
                            <option value="onboarding">Onboarding</option>
                            <option value="mistakes">Mistakes & Lessons</option>
                            <option value="operational">Operational</option>
                            <option value="critical">Critical & Strategic</option>
                        </select>
                        <select class="form-select" id="sortFilter" onchange="sortCards()">
                            <option value="newest">Newest First</option>
                            <option value="oldest">Oldest First</option>
                            <option value="title">Title A-Z</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cards List -->
        <div class="row g-4" id="cardsContainer">
            <!-- Pending Card 1 -->
            <div class="col-lg-6" data-status="pending" data-type="onboarding">
                <div class="contribution-card pending-card">
                    <div class="card-status-badge pending-badge">
                        <i class="fas fa-clock"></i> Pending Review
                    </div>
                    <div class="contribution-card-header">
                        <div class="card-type-badge onboarding-badge">
                            <i class="fas fa-graduation-cap"></i> Onboarding
                        </div>

                    </div>
                    <div class="contribution-card-body">
                        <h4>Git Workflow Best Practices</h4>
                        <p>Essential guide for new developers on how to use Git effectively in our team. Covers branching
                            strategies, commit messages, and pull request guidelines.</p>
                        <div class="card-meta-info">
                            <span class="meta-item">
                                <i class="fas fa-tag"></i> git, workflow, best-practices
                            </span>
                            <span class="meta-item">
                                <i class="fas fa-paperclip"></i> 2 attachments
                            </span>
                        </div>
                    </div>
                    <div class="contribution-card-footer">
                        <button class="btn btn-sm btn-outline-primary" onclick="viewCard(1)">
                            <i class="fas fa-eye"></i> View
                        </button>
                        <button class="btn btn-sm btn-outline-warning" onclick="editCard(1)">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="btn btn-sm btn-outline-danger" onclick="deleteCard(1)">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </div>
                </div>
            </div>

            <!-- Pending Card 2 -->
            <div class="col-lg-6" data-status="pending" data-type="operational">
                <div class="contribution-card pending-card">
                    <div class="card-status-badge pending-badge">
                        <i class="fas fa-clock"></i> Pending Review
                    </div>
                    <div class="contribution-card-header">
                        <div class="card-type-badge operational-badge">
                            <i class="fas fa-cogs"></i> Operational
                        </div>

                    </div>
                    <div class="contribution-card-body">
                        <h4>Docker Container Setup Guide</h4>
                        <p>Step-by-step instructions for setting up Docker containers for local development. Includes
                            troubleshooting common issues and optimization tips.</p>
                        <div class="card-meta-info">
                            <span class="meta-item">
                                <i class="fas fa-tag"></i> docker, containers, setup
                            </span>
                            <span class="meta-item">
                                <i class="fas fa-paperclip"></i> 1 attachment
                            </span>
                        </div>
                    </div>
                    <div class="contribution-card-footer">
                        <button class="btn btn-sm btn-outline-primary" onclick="viewCard(2)">
                            <i class="fas fa-eye"></i> View
                        </button>
                        <button class="btn btn-sm btn-outline-warning" onclick="editCard(2)">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="btn btn-sm btn-outline-danger" onclick="deleteCard(2)">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </div>
                </div>
            </div>

            <!-- Approved Card 1 -->
            <div class="col-lg-6" data-status="approved" data-type="mistakes">
                <div class="contribution-card approved-card">
                    <div class="card-status-badge approved-badge">
                        <i class="fas fa-check-circle"></i> Approved
                    </div>
                    <div class="contribution-card-header">
                        <div class="card-type-badge mistakes-badge">
                            <i class="fas fa-exclamation-triangle"></i> Mistakes & Lessons
                        </div>

                    </div>
                    <div class="contribution-card-body">
                        <h4>Common API Integration Mistakes</h4>
                        <p>Lessons learned from integrating third-party APIs. Covers authentication issues, rate limiting,
                            and error handling strategies I wish I knew earlier.</p>
                        <div class="card-meta-info">
                            <span class="meta-item">
                                <i class="fas fa-tag"></i> api, integration, mistakes
                            </span>
                            <span class="meta-item">
                                <i class="fas fa-eye"></i> 45 views
                            </span>
                        </div>
                    </div>
                    <div class="contribution-card-footer">
                        <button class="btn btn-sm btn-outline-primary" onclick="viewCard(3)">
                            <i class="fas fa-eye"></i> View
                        </button>
                        <button class="btn btn-sm btn-outline-secondary" disabled>
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="btn btn-sm btn-outline-danger" onclick="deleteCard(3)">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </div>
                </div>
            </div>

            <!-- Approved Card 2 -->
            <div class="col-lg-6" data-status="approved" data-type="critical">
                <div class="contribution-card approved-card">
                    <div class="card-status-badge approved-badge">
                        <i class="fas fa-check-circle"></i> Approved
                    </div>
                    <div class="contribution-card-header">
                        <div class="card-type-badge critical-badge">
                            <i class="fas fa-star"></i> Critical & Strategic
                        </div>

                    </div>
                    <div class="contribution-card-body">
                        <h4>How I Got Promoted to Senior Developer</h4>
                        <p>My journey from junior to senior developer in 2 years. Key skills I developed, projects that made
                            a difference, and advice for others on the same path.</p>
                        <div class="card-meta-info">
                            <span class="meta-item">
                                <i class="fas fa-tag"></i> career, promotion, growth
                            </span>
                            <span class="meta-item">
                                <i class="fas fa-eye"></i> 128 views
                            </span>
                            <span class="meta-item">
                                <i class="fas fa-bookmark"></i> 24 saved
                            </span>
                        </div>
                    </div>
                    <div class="contribution-card-footer">
                        <button class="btn btn-sm btn-outline-primary" onclick="viewCard(4)">
                            <i class="fas fa-eye"></i> View
                        </button>
                        <button class="btn btn-sm btn-outline-secondary" disabled>
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="btn btn-sm btn-outline-danger" onclick="deleteCard(4)">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </div>
                </div>
            </div>

            <!-- Approved Card 3 -->
            <div class="col-lg-6" data-status="approved" data-type="onboarding">
                <div class="contribution-card approved-card">
                    <div class="card-status-badge approved-badge">
                        <i class="fas fa-check-circle"></i> Approved
                    </div>
                    <div class="contribution-card-header">
                        <div class="card-type-badge onboarding-badge">
                            <i class="fas fa-graduation-cap"></i> Onboarding
                        </div>

                    </div>
                    <div class="contribution-card-body">
                        <h4>First Week Survival Guide</h4>
                        <p>Everything I wish someone told me during my first week. Team structure, communication channels,
                            daily routines, and who to ask for help.</p>
                        <div class="card-meta-info">
                            <span class="meta-item">
                                <i class="fas fa-tag"></i> onboarding, first-week, guide
                            </span>
                            <span class="meta-item">
                                <i class="fas fa-eye"></i> 89 views
                            </span>
                            <span class="meta-item">
                                <i class="fas fa-bookmark"></i> 15 saved
                            </span>
                        </div>
                    </div>
                    <div class="contribution-card-footer">
                        <button class="btn btn-sm btn-outline-primary" onclick="viewCard(5)">
                            <i class="fas fa-eye"></i> View
                        </button>
                        <button class="btn btn-sm btn-outline-secondary" disabled>
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="btn btn-sm btn-outline-danger" onclick="deleteCard(5)">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </div>
                </div>
            </div>

            <!-- Approved Card 4 -->
            <div class="col-lg-6" data-status="approved" data-type="operational">
                <div class="contribution-card approved-card">
                    <div class="card-status-badge approved-badge">
                        <i class="fas fa-check-circle"></i> Approved
                    </div>
                    <div class="contribution-card-header">
                        <div class="card-type-badge operational-badge">
                            <i class="fas fa-cogs"></i> Operational
                        </div>
                        
                    </div>
                    <div class="contribution-card-body">
                        <h4>Database Backup Procedures</h4>
                        <p>Complete guide for performing database backups. Includes automated scripts, manual backup steps,
                            and recovery procedures for emergencies.</p>
                        <div class="card-meta-info">
                            <span class="meta-item">
                                <i class="fas fa-tag"></i> database, backup, procedures
                            </span>
                            <span class="meta-item">
                                <i class="fas fa-eye"></i> 67 views
                            </span>
                            <span class="meta-item">
                                <i class="fas fa-paperclip"></i> 3 attachments
                            </span>
                        </div>
                    </div>
                    <div class="contribution-card-footer">
                        <button class="btn btn-sm btn-outline-primary" onclick="viewCard(6)">
                            <i class="fas fa-eye"></i> View
                        </button>
                        <button class="btn btn-sm btn-outline-secondary" disabled>
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="btn btn-sm btn-outline-danger" onclick="deleteCard(6)">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Empty State (Hidden by default) -->
        <div class="empty-state" id="emptyState" style="display: none;">
            <div class="empty-icon">
                <i class="fas fa-inbox"></i>
            </div>
            <h4>No cards found</h4>
            <p>Try adjusting your filters or create a new knowledge card</p>
            <button class="btn btn-primary" onclick="window.location.href='/employee/add-knowledge'">
                <i class="fas fa-plus-circle me-2"></i> Add Your First Card
            </button>
        </div>

        <!-- Pagination -->
        <div class="pagination-container" id="paginationContainer">
            <div class="pagination-info">
                Showing <strong>1-6</strong> of <strong>28</strong> cards
            </div>
            <nav>
                <ul class="pagination mb-0">
                    <li class="page-item disabled">
                        <a class="page-link" href="#"><i class="fas fa-chevron-left"></i></a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- View Card Modal -->
    <div class="modal fade" id="viewCardModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-file-alt me-2"></i> Card Details
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="card-detail-view">
                        <div class="detail-status-badge approved-badge mb-3">
                            <i class="fas fa-check-circle"></i> Approved
                        </div>
                        <h3>Git Workflow Best Practices</h3>
                        <div class="detail-meta mb-4">
                            <span class="badge bg-primary-subtle text-primary">
                                <i class="fas fa-graduation-cap me-1"></i> Onboarding Knowledge
                            </span>
                            <span class="text-muted">
                                <i class="fas fa-calendar me-1"></i> Created 2 hours ago
                            </span>
                            <span class="text-muted">
                                <i class="fas fa-eye me-1"></i> 0 views
                            </span>
                        </div>
                        <div class="detail-content">
                            <h6>Summary</h6>
                            <p>Essential guide for new developers on how to use Git effectively in our team. Covers
                                branching strategies, commit messages, and pull request guidelines.</p>

                            <h6>Main Content</h6>
                            <p>This is the full detailed content of the knowledge card...</p>

                            <h6>Tags</h6>
                            <div class="tags-list">
                                <span class="badge bg-light text-dark">git</span>
                                <span class="badge bg-light text-dark">workflow</span>
                                <span class="badge bg-light text-dark">best-practices</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-warning">
                        <i class="fas fa-edit me-1"></i> Edit
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">
                        <i class="fas fa-exclamation-triangle me-2"></i> Confirm Delete
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">Are you sure you want to delete this knowledge card? This action cannot be undone.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" onclick="confirmDelete()">
                        <i class="fas fa-trash me-1"></i> Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        // My Contributions Page JavaScript

        let currentDeleteCardId = null;

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            initializeSearch();
            initializeFilters();
            animateCards();
        });

        // Initialize Search
        function initializeSearch() {
            const searchInput = document.getElementById('searchInput');

            searchInput.addEventListener('input', function(e) {
                const searchTerm = e.target.value.toLowerCase();
                filterCardsBySearch(searchTerm);
            });
        }

        // Filter Cards by Search
        function filterCardsBySearch(searchTerm) {
            const cards = document.querySelectorAll('[data-status]');
            let visibleCount = 0;

            cards.forEach(card => {
                const title = card.querySelector('h4').textContent.toLowerCase();
                const content = card.querySelector('p').textContent.toLowerCase();
                const tags = card.querySelector('.meta-item').textContent.toLowerCase();

                if (title.includes(searchTerm) || content.includes(searchTerm) || tags.includes(searchTerm)) {
                    card.style.display = '';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            toggleEmptyState(visibleCount === 0);
        }

        // Initialize Filters
        function initializeFilters() {
            // No additional initialization needed as onchange is inline
        }

        // Filter Cards
        function filterCards() {
            const statusFilter = document.getElementById('statusFilter').value;
            const typeFilter = document.getElementById('typeFilter').value;
            const cards = document.querySelectorAll('[data-status]');
            let visibleCount = 0;

            cards.forEach(card => {
                const cardStatus = card.getAttribute('data-status');
                const cardType = card.getAttribute('data-type');

                let showCard = true;

                if (statusFilter !== 'all' && cardStatus !== statusFilter) {
                    showCard = false;
                }

                if (typeFilter !== 'all' && cardType !== typeFilter) {
                    showCard = false;
                }

                if (showCard) {
                    card.style.display = '';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            toggleEmptyState(visibleCount === 0);
        }

        // Sort Cards
        function sortCards() {
            const sortValue = document.getElementById('sortFilter').value;
            const container = document.getElementById('cardsContainer');
            const cards = Array.from(container.children);

            cards.sort((a, b) => {
                if (sortValue === 'newest') {
                    // Sort by date (newest first) - simplified
                    return 0;
                } else if (sortValue === 'oldest') {
                    // Sort by date (oldest first) - simplified
                    return 0;
                } else if (sortValue === 'title') {
                    const titleA = a.querySelector('h4').textContent.toLowerCase();
                    const titleB = b.querySelector('h4').textContent.toLowerCase();
                    return titleA.localeCompare(titleB);
                }
                return 0;
            });

            // Re-append sorted cards
            cards.forEach(card => container.appendChild(card));
        }

        // Toggle Empty State
        function toggleEmptyState(show) {
            const emptyState = document.getElementById('emptyState');
            const cardsContainer = document.getElementById('cardsContainer');
            const paginationContainer = document.getElementById('paginationContainer');

            if (show) {
                emptyState.style.display = 'block';
                cardsContainer.style.display = 'none';
                paginationContainer.style.display = 'none';
            } else {
                emptyState.style.display = 'none';
                cardsContainer.style.display = 'flex';
                paginationContainer.style.display = 'flex';
            }
        }

        // Animate Cards on Load
        function animateCards() {
            const cards = document.querySelectorAll('.contribution-card');

            cards.forEach((card, index) => {
                setTimeout(() => {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(20px)';
                    card.style.transition = 'all 0.5s ease';

                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, 50);
                }, index * 100);
            });
        }

        // View Card
        function viewCard(cardId) {
            // Show modal with card details
            const modal = new bootstrap.Modal(document.getElementById('viewCardModal'));
            modal.show();

            // In real app, load card details via API
            console.log('Viewing card:', cardId);
        }

        // Edit Card
        function editCard(cardId) {
            // Redirect to edit page
            window.location.href = `/employee/edit-knowledge/${cardId}`;

            console.log('Editing card:', cardId);
            showNotification('Redirecting to edit page...', 'info');
        }

        // Delete Card
        function deleteCard(cardId) {
            currentDeleteCardId = cardId;
            const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
            modal.show();
        }

        // Confirm Delete
        function confirmDelete() {
            if (currentDeleteCardId) {
                // Remove card from DOM
                const cards = document.querySelectorAll('.contribution-card');
                const cardToDelete = Array.from(cards).find((card, index) => index + 1 === currentDeleteCardId);

                if (cardToDelete) {
                    // Animate deletion
                    cardToDelete.style.transition = 'all 0.3s ease';
                    cardToDelete.style.opacity = '0';
                    cardToDelete.style.transform = 'translateX(-20px)';

                    setTimeout(() => {
                        cardToDelete.closest('.col-lg-6').remove();
                        updateStatistics();
                        showNotification('Knowledge card deleted successfully', 'success');
                    }, 300);
                }

                // Close modal
                const modal = bootstrap.Modal.getInstance(document.getElementById('deleteModal'));
                modal.hide();

                currentDeleteCardId = null;
            }
        }

        // Update Statistics
        function updateStatistics() {
            // Count cards by status
            const allCards = document.querySelectorAll('[data-status]');
            const pendingCards = document.querySelectorAll('[data-status="pending"]');
            const approvedCards = document.querySelectorAll('[data-status="approved"]');
            const rejectedCards = document.querySelectorAll('[data-status="rejected"]');

            // Update stat cards
            const statCards = document.querySelectorAll('.contribution-stat-card');

            if (statCards[0]) {
                const totalCount = statCards[0].querySelector('h3');
                animateNumber(totalCount, parseInt(totalCount.textContent), allCards.length);
            }

            if (statCards[2]) {
                const pendingCount = statCards[2].querySelector('h3');
                animateNumber(pendingCount, parseInt(pendingCount.textContent), pendingCards.length);
            }
        }

        // Animate Number
        function animateNumber(element, from, to) {
            const duration = 500;
            const steps = 20;
            const stepDuration = duration / steps;
            const increment = (to - from) / steps;
            let current = from;
            let stepCount = 0;

            const timer = setInterval(() => {
                current += increment;
                stepCount++;
                element.textContent = Math.round(current);

                if (stepCount >= steps) {
                    clearInterval(timer);
                    element.textContent = to;
                }
            }, stepDuration);
        }

        // Show Notification
        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            notification.className = `alert alert-${type} notification-toast`;
            notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
        min-width: 300px;
        animation: slideIn 0.3s ease;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    `;

            const icons = {
                success: 'fa-check-circle',
                info: 'fa-info-circle',
                warning: 'fa-exclamation-triangle',
                danger: 'fa-times-circle'
            };

            notification.innerHTML = `
        <i class="fas ${icons[type]} me-2"></i>
        ${message}
    `;

            document.body.appendChild(notification);

            setTimeout(() => {
                notification.style.animation = 'slideOut 0.3s ease';
                setTimeout(() => {
                    notification.remove();
                }, 300);
            }, 3000);
        }

        // Export Quick Stats
        function exportStats() {
            const stats = {
                total: document.querySelectorAll('[data-status]').length,
                pending: document.querySelectorAll('[data-status="pending"]').length,
                approved: document.querySelectorAll('[data-status="approved"]').length,
                rejected: document.querySelectorAll('[data-status="rejected"]').length
            };

            console.log('Statistics:', stats);
            showNotification('Statistics exported successfully', 'success');
        }

        // Filter by Status Quick Action
        function filterByStatus(status) {
            document.getElementById('statusFilter').value = status;
            filterCards();
        }

        // Clear All Filters
        function clearFilters() {
            document.getElementById('statusFilter').value = 'all';
            document.getElementById('typeFilter').value = 'all';
            document.getElementById('sortFilter').value = 'newest';
            document.getElementById('searchInput').value = '';

            filterCards();
            showNotification('All filters cleared', 'info');
        }

        // Export functions for global use
        window.MyContributions = {
            filterCards,
            sortCards,
            viewCard,
            editCard,
            deleteCard,
            confirmDelete,
            exportStats,
            filterByStatus,
            clearFilters
        };

        // Add CSS animations
        const style = document.createElement('style');
        style.textContent = `
    @keyframes slideIn {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes slideOut {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }
`;
        document.head.appendChild(style);
    </script>
@endsection
