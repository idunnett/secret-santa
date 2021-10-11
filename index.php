<?php
require_once('includes/header.php');
?>
<h1>2021 Secret Santa Draw</h1>
<main>
    <section>
        <form action="result.php" method="post">
            <h2>Please enter your email and select which team you belong to.</h2>
            <input type="email" name="email" id="email" placeholder="name@example.com" required>
            <input type="radio" name="team" id="team1" value="1" checked>
            <label for="team1">Dunnett/Lauder/McLeod</label>
            <input type="radio" name="team" id="team2" value="2">
            <label for="team2">Rossiter/Kelly/Manoharan</label>
            <input type="submit" value="Draw">
            <?php include('includes/remainingPeople.php') ?>
            <small>Number of people yet to draw: <?php echo $remaining_draws ?></small>
        </form>
    </section>
    <?php include_once('includes/sidebar.php'); ?>
</main>
<?php
require_once('includes/footer.php');
?>