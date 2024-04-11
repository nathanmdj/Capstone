<div class="sidebar-container" id="scrollableDiv">
    <div class="ads mb-3 ">
        @include('include.ads-carousel')
    </div>
    <div class="trend-container text-white">
        <div class="header">
            <h4>Trending Topics</h4>
        </div>
        @foreach ($trendingHashtags as $trend)
            <a href="{{ url("/?search=$trend->name") }}">
                <div class="topics">
                    <h5>{{ '#' . $trend->name }}</h5>
                </div>
            </a>
        @endforeach

    </div>
    <div class="footer mt-3">
        <div class="links d-flex align-items-center ">
            <a href="">
                <p>Terms of Use</p>
            </a>
            <span class="bi bi-dot"></span>
            <a href="">
                <p>Privacy Policy</p>
            </a>
        </div>
        <p>&copy2024 DevX. All rights reserved.</p>
    </div>
</div>
<script>
    window.addEventListener('scroll', function() {
        var scrollableDiv = document.getElementById('scrollableDiv');
        var divHeight = scrollableDiv.clientHeight;
        var windowHeight = window.innerHeight;
        var windowScrollPosition = window.scrollY;
        if (divHeight + 150 > (windowHeight + windowScrollPosition)) {
            scrollableDiv.style.top = '-' + window.scrollY + 'px';
        }
    });
</script>
