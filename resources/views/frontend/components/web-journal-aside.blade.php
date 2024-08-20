<div class="col-xl-4 mb-30">
    <div class="blog-sidebar">
        <div class="widget-box mb-30">
            <h4 class="widget-title">{{ __('Categories') }}</h4>
            <div class="category-widget-box">
                <ul class="category-list">
                    @foreach ($categories as $item)
                        <li><a href="javascript:void(0)">{{ $item->name }} <span>{{ isset($item->webJournals) ? count($item->webJournals) : '0' }}</span></a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="widget-box mb-30">
            <h4 class="widget-title">{{ __('Recent Posts') }}</h4>
            <div class="popular-widget-box">
                @foreach($recent_journals as $key => $item)
                    <div class="single-popular-item d-flex flex-wrap align-items-center">
                        <div class="popular-item-thumb">
                            <a href="{{ route('web-journal.details', [$item->id, $item->slug]) }}"><img src="{{ get_image($item->image, 'web-journal') }}" alt="blog"></a>
                        </div>
                        <div class="popular-item-content">
                            <span class="date">{{ dateFormat('d F, Y', $item->created_at) }}</span>
                            <h6 class="title"><a href="{{ route('web-journal.details', [$item->id, $item->slug]) }}">{{ Str::limit($item->title->language->$lang->title??$item->title->language->$default_lang->title??'', 50, '...') }}</a></h6>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="widget-box">
            <h4 class="widget-title">{{ __('Tags') }}</h4>
            <div class="tag-widget-box">
                <ul class="tag-list">
                    @foreach ($journals as $tag_data)
                        @foreach ($tag_data->tags->language->$lang->tags??$tag_data->tags->language->$default_lang->tags??[] as $tag)
                            <li><a href="#0">{{ $tag }}</a></li>
                        @endforeach
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
