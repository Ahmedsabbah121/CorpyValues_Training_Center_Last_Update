@extends('welcome')
@section('content')

<section class="divider" style="margin-top: 5%">
    <div class="section-content">
        <div class="row">
            <div class="col-md-12">
                <div class="container p-0">
                    @if($id == 'best-laptop')
                        <h2 class="icon-box-title mt-5 mb-15 letter-space-1 line-height-1">Best Laptop</h2>
                        <p style="font-size:16px;">Lorem ipsum dolor sit amet elit. Duis erat nec. Ut lobortis, magna nec rhoncus, neque quam mattis ipsum, vel erat velit at diam.
                                                    Lorem ipsum dolor sit amet elit. Duis erat nec. Ut lobortis, magna nec rhoncus, neque quam mattis ipsum, vel erat velit at diam.
                                                    Lorem ipsum dolor sit amet elit. Duis erat nec. Ut lobortis, magna nec rhoncus, neque quam mattis ipsum, vel erat velit at diam.
                                                    Lorem ipsum dolor sit amet elit. Duis erat nec. Ut lobortis, magna nec rhoncus, neque quam mattis ipsum, vel erat velit at diam.
                        </p>
                        @elseif($id == 'best-teacher')
                        <h2 class="icon-box-title mt-5 mb-15 letter-space-1 line-height-1">Best Teacher</h2>
                        <p style="font-size:16px;">Lorem ipsum dolor sit amet elit. Duis erat nec. Ut lobortis, magna nec rhoncus, neque quam mattis ipsum, vel erat velit at diam.
                                                    Lorem ipsum dolor sit amet elit. Duis erat nec. Ut lobortis, magna nec rhoncus, neque quam mattis ipsum, vel erat velit at diam.
                                                    Lorem ipsum dolor sit amet elit. Duis erat nec. Ut lobortis, magna nec rhoncus, neque quam mattis ipsum, vel erat velit at diam.
                                                    Lorem ipsum dolor sit amet elit. Duis erat nec. Ut lobortis, magna nec rhoncus, neque quam mattis ipsum, vel erat velit at diam.
                        </p>
                        @elseif($id == 'best-library')
                        <h2 class="icon-box-title mt-5 mb-15 letter-space-1 line-height-1">Best Library</h2>
                        <p style="font-size:16px;">Lorem ipsum dolor sit amet elit. Duis erat nec. Ut lobortis, magna nec rhoncus, neque quam mattis ipsum, vel erat velit at diam.
                                                    Lorem ipsum dolor sit amet elit. Duis erat nec. Ut lobortis, magna nec rhoncus, neque quam mattis ipsum, vel erat velit at diam.
                                                    Lorem ipsum dolor sit amet elit. Duis erat nec. Ut lobortis, magna nec rhoncus, neque quam mattis ipsum, vel erat velit at diam.
                                                    Lorem ipsum dolor sit amet elit. Duis erat nec. Ut lobortis, magna nec rhoncus, neque quam mattis ipsum, vel erat velit at diam.
                        </p>
                        @endif
                </div>
            </div>
        </div>
    </div>
</section>

@endsection