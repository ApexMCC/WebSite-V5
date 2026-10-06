<?php
// Original site sent every missing page to the coming-soon page (most nav links aren't built yet).
header('Location: /coming-soon.php', true, 302);
exit;
