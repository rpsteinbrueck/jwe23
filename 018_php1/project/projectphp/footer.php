        </section>
        <footer>
            &copy; <?php echo "2023 - " . date("Y") . " " . $nav_items[$site]?> <a href="http://www.wifisalzburg.at" target="_blank">wifisalzburg</a> | <a href="http://www.wifisalzburg.at/artikel/2545-offenlegung" target="_blank">Impressum</a>
            <div class="clear"></div>
            <?php 
                echo "<nav><ul>";
                $sitename = strtolower($i);
                foreach ($nav_items as $i) {
                    $sitename = strtolower($i);
                    echo "<li><a href=\"?site={$sitename}\">{$i}</a></li>";
                }
                echo "</ul></nav>";
            ?>
        </footer>
    </body>
</html>