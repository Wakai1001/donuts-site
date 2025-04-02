<?php session_start(); ?>
<?php require 'includes/header.php' ?>

<main>
<h2>ご購入確認</h2>
<table>
<tr>
  <th>
    商品名&#65306;
  </th>
  <td>
    <?=$_SESSION['product']['name']?>
  </td>
  <th>
    数量&#65306;
  </th>
  <td>
  <?=$_SESSION['purchase_detail']['count']?>個
  </td>
  <th>
    小計&#65306;
  </th>
  <td>

  </td>

</tr>


</table>

<h3>ご購入商品</h3>





<h3>お届け先</h3>




<h3>お支払方法</h3>









</main>



<?php require 'includes/footer.php' ?>