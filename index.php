<?php  
include 'partials/header.php';
if(isset($_GET['submit'])){
    $login = $_GET['login'];
    $curl = curl_init();
curl_setopt_array($curl,[
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.github.com/users/'.$login,
    CURLOPT_USERAGENT => 'kiskee'
]);
$result = curl_exec($curl);
$user = json_decode($result, true);
}
?>
<div class="container aling-items-center text-center shadow">
<h1>Search GitHub User</h1>
<form action="" method="GET">       
    <label for="character">GitHub UserName</label>
    <input type="text" name="login" value="" required placeholder="name" class="shadow border">
    <button type="submit" class="btn btn-lg btn-danger shadow" name="submit">Search</button>
</form>
<?php if($login):  ?>


<div class="card mb-3">
<h3 class="card-header bg-dark text-white shadow"><?php echo $user['login'] ?></h3>
<div class="card-body">
  <h5 class="card-title">Genre</h5>
  <h6 class="card-subtitle text-muted"><?php echo $user['id'] ?></h6>
</div>
<p class="card-text"><?php echo '<img src="'.$user['avatar_url'].'" style="width:250px; height:250px" class="card-img-top"></img>';   ?></p>
<div class="card-body">
  <p class="card-text"><?php echo $user['Plot'] ?></p>
</div>
<ul class="list-group list-group-flush bg-primary">
  <li class="list-group-item">Id: <?php echo $user['imdbID'];  ?> </li>
  <li class="list-group-item">Type: <?php echo $user['Type'];  ?></li>
  <li class="list-group-item">Rated: <?php echo $user['Rated'];  ?></li>
  <li class="list-group-item">Released: <?php echo $user['Released'];  ?></li>
  <li class="list-group-item">Runtime: <?php echo $user['Runtime'];  ?></li>
  <li class="list-group-item">Director: <?php echo $user['Director'];  ?></li>
  <li class="list-group-item">imdbRating: <?php echo $user['imdbRating'];  ?></li>
  <li class="list-group-item">imdbVotes: <?php echo $user['imdbVotes'];  ?></li>
</ul>
<div class="card-body">
  <a href="#" class="card-link">Card link</a>
  <a href="#" class="card-link">Another link</a>
</div>
<div class="card-footer text-muted">
Year <?php echo $user['Year'] ?>
</div>
</div>
<?php endif;  ?>
</div>
<?php
include 'partials/footer.php';
?>