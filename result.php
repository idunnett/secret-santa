<?php
require_once("includes/process-draw.php");
require_once('includes/header.php');
?>
<h1>2021 Secret Santa Draw</h1>
<a href="index.php" class="back-btn">&larr;</a>
<main>
    <section class="result-section">
        <?php
        if ($drawMessage == "") {
        ?>
        <p>Your draw is...</p>
        <h2 id="draw-name"><?php echo $drawName ?></h2>
        <small class="confirm-msg">Check your email for confirmation.</small>
        <?php
        } else {
            echo "<p>$drawMessage</p>";
        }
        ?>
        <?php include('includes/remainingPeople.php') ?>
        <small>Number of people yet to draw: <?php echo $remaining_draws ?></small>
    </section>
    <?php include_once('includes/sidebar.php'); ?>
</main>
<?php
require_once('includes/footer.php');
?>