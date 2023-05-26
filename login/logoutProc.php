<?php
  session_start();
  session_destroy();

?>

<script>
  alert('정상적으로 로그아웃되었습니다.');
  window.history.back();
</script>