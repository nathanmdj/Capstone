<div class="sidebar-container" id="scrollableDiv">
    <div class="ads mb-3 ">
        @include('include.ads-carousel')
    </div>
    <div class="trend-container text-white">
        <div class="header">
            <h4>Trending Topics</h4>
        </div>
        <div class="topics">
            <h5>#Laravel11.0</h5>
        </div>
        <div class="topics">
            <h5>#OOP</h5>
        </div>
        <div class="topics">
            <h5>#Polymorphism</h5>
        </div>
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
