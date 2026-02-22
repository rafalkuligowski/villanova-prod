<?php if (have_rows('faq')) : ?>

    <div class="faq-section">
        <h2>Najczęściej zadawane pytania</h2>

        <div class="faq-items">
            <?php
            $faq_schema = [];
            while (have_rows('faq')) : the_row();

                $faq_item = get_sub_field('faq_item');
                $question = $faq_item['question'] ?? '';
                $answer   = $faq_item['answer'] ?? '';

                if ($question && $answer) :

                    // Prepare schema data
                    $faq_schema[] = [
                        "@type" => "Question",
                        "name"  => wp_strip_all_tags($question),
                        "acceptedAnswer" => [
                            "@type" => "Answer",
                            "text"  => wp_kses_post($answer)
                        ]
                    ];
            ?>
                <div class="faq-item is-close">
                    <div class="faq-question">
                        <h3><?php echo esc_html($question); ?></h3>
                    </div>
                    <div class="faq-answer">
                        <span><?php echo esc_html($answer); ?></span>
                    </div>
                </div>
            <?php
                endif;
            endwhile;
            ?>
        </div>
    </div>

    <!-- FAQ Schema JSON-LD -->
    <script type="application/ld+json">
    <?php
        echo json_encode([
            "@context" => "https://schema.org",
            "@type"    => "FAQPage",
            "mainEntity" => $faq_schema
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    ?>
    </script>

<?php endif; ?>
