    <footer id="footer">
    <!-- Wordpress Footer -->
    <?php wp_footer(); ?>
    <?php if(@defined(WP_HOME) && WP_HOME === 'http://caitlincordtz.com/'): ?>
    <script>
      // (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      // (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      // m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      // })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      // ga('create', 'UA-26664609-5', 'caitlincordtz.com');
      // ga('send', 'pageview');
    </script>
    <?php else : ?>
      <!-- Not Using Google Analytics, because you WP_HOME variable doesn't match the required url -->
      <!-- WP_HOME : <?php echo WP_HOME; ?> -->
    <?php endif; ?>
    </footer>
  </div><!-- END .container -->
</body>
</html>