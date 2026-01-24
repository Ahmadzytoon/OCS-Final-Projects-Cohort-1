<div>
    <section class="hero-section text-center pt-5 mt-5 bg-dark">
        <div class="container mt-5">
            <h1 class="display-4 fw-bold mb-4">Legal <span class="text-warning">Insights</span> & News</h1>
            <p class="lead text-muted mb-5">Expert analysis and guides on the latest legal developments.</p>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="input-group input-group-lg shadow-lg border border-secondary rounded-pill overflow-hidden bg-primary-navy">
                        <span class="input-group-text bg-transparent border-0 text-muted ps-4"><i class="fas fa-search"></i></span>
                        <input type="text" class="form-control bg-primary-navy border-0 py-3 text-white" placeholder="Search articles..." wire:model.live="search">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-5">
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="d-flex justify-content-center gap-2 flex-wrap">
                    <button class="btn {{ $categoryFilter === '' ? 'btn-gold' : 'btn-outline-secondary' }} rounded-pill px-4" wire:click="$set('categoryFilter', '')">All</button>
                    @foreach($categories as $category)
                        <button class="btn {{ $categoryFilter == $category->id ? 'btn-gold' : 'btn-outline-secondary' }} rounded-pill px-4" wire:click="$set('categoryFilter', '{{ $category->id }}')">{{ $category->name }}</button>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row g-4">
            @forelse($articles as $article)
            <div class="col-md-4">
                <div class="card h-100 bg-primary-navy border-secondary shadow-sm card-hover">
                    @if($article->image_path)
                    <img src="{{ $article->image_path }}" class="card-img-top" alt="{{ $article->title }}" style="height: 200px; object-fit: cover;">
                    @else
                    <div class="card-img-top bg-dark d-flex align-items-center justify-content-center" style="height: 200px;">
                        <i class="fas fa-balance-scale fa-3x text-muted"></i>
                    </div>
                    @endif
                    <div class="card-body d-flex flex-column p-4">
                        <div class="mb-2">
                            <span class="badge bg-soft-warning text-warning rounded-pill mb-2">{{ $article->category->name ?? 'Legal' }}</span>
                            <span class="text-muted small ms-2"><i class="far fa-clock me-1"></i> {{ $article->created_at->format('M d, Y') }}</span>
                        </div>
                        <h5 class="card-title fw-bold text-white mb-3">{{ $article->title }}</h5>
                        <p class="card-text text-muted small mb-4 flex-grow-1">{{ Str::limit(strip_tags($article->content), 120) }}</p>
                        
                        <div class="d-flex align-items-center justify-content-between mt-auto pt-3 border-top border-secondary">
                            <div class="d-flex align-items-center">
                                <img src="https://ui-avatars.com/api/?name={{ $article->author->name }}&background=random" class="rounded-circle me-2" width="30" height="30">
                                <small class="text-white-50">{{ $article->author->name }}</small>
                            </div>
                            <a href="{{ route('article.details', $article->id) }}" class="btn btn-link text-warning p-0 text-decoration-none fw-bold">Read More <i class="fas fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <div class="py-5">
                    <i class="far fa-folder-open fa-4x text-muted mb-3 opacity-50"></i>
                    <h3 class="text-white-50">No articles found</h3>
                    <p class="text-muted">Try adjusting your search or category filter.</p>
                </div>
            </div>
            @endforelse
        </div>

        <div class="px-4 py-3 border-top border-secondary d-flex align-items-center justify-content-between mt-5">
            <div class="text-muted small">
                Showing {{ $articles->firstItem() ?? 0 }} to {{ $articles->lastItem() ?? 0 }} of {{ $articles->total() }} results
            </div>
            <div class="d-flex align-items-center gap-2">
                @if ($articles->onFirstPage())
                    <button class="btn btn-sm btn-secondary disabled" style="opacity: 0.5; cursor: not-allowed; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); color: #94a3b8;">
                        <i class="fas fa-chevron-left"></i> Previous
                    </button>
                @else
                    <button wire:click="previousPage" class="btn btn-sm btn-outline-light" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); color: #e2e8f0;">
                        <i class="fas fa-chevron-left"></i> Previous
                    </button>
                @endif

                <span class="text-muted small mx-2">
                    Page {{ $articles->currentPage() }} of {{ $articles->lastPage() }}
                </span>

                @if ($articles->hasMorePages())
                    <button wire:click="nextPage" class="btn btn-sm btn-outline-light" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); color: #e2e8f0;">
                        Next <i class="fas fa-chevron-right"></i>
                    </button>
                @else
                    <button class="btn btn-sm btn-secondary disabled" style="opacity: 0.5; cursor: not-allowed; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); color: #94a3b8;">
                        Next <i class="fas fa-chevron-right"></i>
                    </button>
                @endif
            </div>
        </div>
    </div>
</div>
