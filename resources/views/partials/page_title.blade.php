<!-- PAGE TITLE SECTION-->
<section class="pageTitleSection">
    <div class="container">
        <div class="pageTitleInfo">
            <h2>{{ $title }}</h2>
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="/">{{ Request::segment(1) }}</a></li>
                <li class="active">{{ $title }}</li>
            </ol>
        </div>
    </div>
</section>