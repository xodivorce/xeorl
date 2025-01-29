<link rel="stylesheet" href="assets/css/_footer.css">
<footer>
    <div class="footer-container" style="user-select: none;">
        <p>
            <img src="assets/images/url.svg" class="footer-img">
            <span class="footer-p1">Xeorl</span> 
            <span class="footer-p2">open source</span> <br>
            <span class="footer-p3">Released under MIT License | Copyright © </span>
        <script>
            document.addEventListener('DOMContentLoaded', (event) => {
                const yearSpan = document.createElement('span');
                yearSpan.textContent = new Date().getFullYear();
                document.querySelector('.footer-p3').appendChild(yearSpan);
            });
        </script>
        </p>
        <div class="footer-links">
            <a href="#">Privacy</a>
            <a href="#">Terms</a>
            <a href="#">Contact</a>
            <a href="https://github.com/xodivorce/xeorl" target="_blank" >Github</a>
        </div>
    </div> 
</footer>
</body>
</html>
