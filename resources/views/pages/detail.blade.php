@extends('layouts.app')

@section('content')
    <div class="container p-4">
        <div class="row g-5">
            <div class="col-md">
                <article class="blog-post">
                    <h2 class="display-5 mb-1">{{ $berita->judul }}</h2>
                    <p class="blog-post-meta">{{ $berita->created_at->format('F j, Y') }} by <a href="#">{{ $berita->user->name }}</a></p>
                    <img src="{{ asset('img/gambar/' . $berita->gambar) }}" class="mb-3 bd-placeholder-img card-img-top"
                        alt="">
                    {!! $berita->isi !!}
                </article>

                <nav class="blog-pagination" aria-label="Pagination">
                    <a class="btn btn-primary" href="/">kembali</a>
                </nav>

            </div>

            {{-- <div class="col-md-4 p-0">
                <div class="position-sticky mt-3 bg-body-tertiary p-4" style="top: 1rem;">
                    <div>
                        <h4 class="fst-italic">Recent posts</h4>
                        <ul class="list-unstyled">
                            @foreach ($berita as $item)
                                <li>
                                    <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top"
                                        href="{{ route('detail', $item->id) }}">
                                        <img src="{{ asset('img/gambar/' . $item->gambar) }}" class="bd-placeholder-img"
                                            width="100%" height="96" alt="">
                                        <div class="col-lg-8">
                                            <h6 class="mb-0">{{ $item->judul }}</h6>
                                            <small class="text-body-secondary">{{ $item->created_at->format('F j, Y') }}</small>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="p-4 mb-3 bg-body-tertiary rounded">
                        <h4 class="fst-italic">About</h4>
                        <p class="mb-0">Customize this section to tell your visitors a little bit about your publication,
                            writers,
                            content, or something else entirely. Totally up to you.</p>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
