<?php if (!empty($knownVideos)): ?>
<script>window.APEX_KNOWN_VIDEOS = <?= json_encode($knownVideos, JSON_UNESCAPED_SLASHES) ?>;</script>
<?php endif; ?>
<script src="/assets/js/main.js"></script>
</body>
</html>
