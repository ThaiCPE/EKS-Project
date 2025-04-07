<?php
/**
 * Template Name: 2048 Game
 * Description: A page template for the 2048 game
 */
get_header(); ?>

<main id="primary" class="site-main game-2048-container">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
            <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
        </header>
        
        <div class="entry-content">
            <p class="game-instruction">Join the numbers to get the 2048 tile!</p>
            <div class="game-wrapper">
                <div class="cover"></div>
                <div class="container">
                    <div class="logo">2048</div>
                    <div class="scoreBar">
                        <label class="score-label">Score:</label>
                        <label id="score">0</label>
                        <div id="addScore"></div>
                    </div>
                    <div id="stage"></div>
                </div>
            </div>
        </div>
    </article>
</main>

<?php get_footer(); ?>