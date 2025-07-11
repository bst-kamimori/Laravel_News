@if ($paginator->hasPages())
        <ul class="pagination" role="navigation">

            {{-- First Page Link --}}
                <!-- 最初のページへのリンク -->
                <li class="page-item {{$paginator->onFirstPage() ? 'disabled' : ''}}">
                    <a class="page-link" href="{{$paginator->url(1)}}">&laquo;</a>
                </li>
            {{-- Previous Page Link --}}
                <!-- 前のページへのリンク -->
                <li class="page-item {{$paginator->onFirstPage() ? 'disabled' : ''}}">
                    <a class="page-link" href="{{$paginator->previousPageUrl() }}">&lsaquo;</a>
                </li>

            <?php $paginates = config('const.PAGINATE.LINK_NUM') ?>


            {{-- Pagination Elements --}}
            {{-- Array of links --}}
            @if ($paginator->lastPage() > $paginates )

                {{-- 現在ページがpaginationの中心位置よりも左の時 --}}
                @if($paginator->currentPage() <= floor( $paginates / 2 ))
                    <?php $start_page = 1; ?>
                    <?php $end_page = $paginates; ?>


                {{-- 現在ページがpaginationの中心位置よりも右の時 --}}
                @elseif($paginator->currentPage() > $paginator->lastPage() - floor($paginates / 2))
                 <?php $start_page = $paginator->lastPage() - ($paginates - 1); ?>
                 <?php $end_page = $paginator->lastPage(); ?>

                {{-- 現在ページがpaginationの中心位置の時 --}}
                @else
                    <?php $start_page = $paginator->currentPage() - (floor(($paginates % 2 == 0 ? $paginates - 1 : $paginates) / 2)); ?>
                    <?php $end_page = $paginator->currentPage() + floor($paginates / 2); ?>

                @endif

                {{-- 検索時に定数よりもページ数が少ない時 --}}
            @else
                <?php $start_page = 1; ?>
                <?php $end_page = $paginator->lastPage(); ?>
            @endif

            {{-- 処理部分 --}}
            @for ($i = $start_page; $i <= $end_page; $i++)
                @if($i == $paginator->currentPage())
                    <li class="page-item active"><span class="page-link">{{ $i }}</span></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                @endif
            @endfor

            {{-- Next Page Link --}}
                <!-- 次のページへのリンク -->
                <li class="page-item {{$paginator->currentPage() == $paginator->lastPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{$paginator->nextPageUrl()}}">&rsaquo;</a>
                </li>

            {{-- Last Page Link --}}
                <!-- 最後のページへのリンク -->
                <li class="page-item {{ $paginator->currentPage() == $paginator->lastPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}">&raquo;</a>
                </li>
        </ul>
@endif
