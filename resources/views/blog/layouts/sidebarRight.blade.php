<div class="col-xs-12 col-sm-4 col-md-4">
    {{-- popular posts --}}
    @if(isset($popularPosts))
        <div class="panel">
            <div class="panel-heading bg-4 sidebar-heading bg-color">
                <p class="panel-title title sdd-font">XEM NHIỀU NHẤT</p>
            </div>
            <div class="panel-body">
                @foreach ($popularPosts as $post)
                    <div class="sdd_module_1 line-bottom">
                        <div class="row">
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                <img style="max-width: 100%;min-height: 50px;max-height: 100%;cursor: pointer;" src="{{ $post->thumbnail }}"  class="thumnail">
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                <h5 class="title">
                                    <a href="{{ route('blog.post.detail', [$post->slug]) }}">
                                        {{ $post->title }}
                                    </a>
                                </h5>
                                <span class="meta-info POSTMETAINLINE postMetaInline--supplemental">
                                    <span>{{ $post->created_at->diffForHumans() }} / </span>
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    <span> {{ $post->view_count }}</span>
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    {{-- end popular posts --}}
    {{-- categories --}}
     @if(isset($categories))
        <div class="panel panel-custome">
            <div class="panel-heading bg-success">
                <h3 class="panel-title text-center" style="line-height: 30px; font-weight: bold;">
                    DANH MỤC
                </h3>
            </div>
            <div class="panel-body panel-body-custome panel-body-facebook">
                <ul class="list list--withIcon list--withTitleSubtitle">
                    @foreach ($categories as $category)
                        <li class="list-item">
                            <button class="button button--circle u-disablePointerEvents">
                                <span class="list-index">
                                    <img src="{{ $category->thumbnail }}" class="thumbnail-category">
                                </span>
                            </button>
                            <div class="list-itemInfo">
                                <h4 class="list-itemTitle">
                                    <a href="{{ route('blog.category.detail', [$category->id, $category->slug]) }}" class="link  link-custome link--primary u-accentColor--textNormal"> 
                                        {{ $category->name }}
                                    </a>
                                </h4>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    {{-- end categories --}}

    {{-- Tags --}}
    @if(isset($tags)) 
        <div class="panel panel-custome">
            <div class="panel-heading bg-info">
                <h3 class="panel-title text-center" style="line-height: 30px; font-weight: bold;">
                    TAGS
                </h3>
            </div>
            {{-- <div class="panel-body panel-body-custome panel-body-facebook"> --}}
                @foreach ($tags as $tag)
                    <a href="{{ route('blog.tag.show', [$tag->id,$tag->slug]) }}">{{ $tag->name }}</a>, 
                @endforeach
            {{-- </div> --}}
        </div>
    @endif
    {{-- end tags --}}
</div>