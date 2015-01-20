<?php
/**
 * Plugin Name: How Secure Is My Password?
 * Plugin URI: http://github.com/howsecureisymypassword/wordpress
 * Description: Adds the How Secure Is My Password strength meter to your user profile pages
 * Version: 0.1
 * Author: Mark Wales
 * Author URI: http://smallhadroncollider.com
 * License: MIT
 */

class Plugin_HSIMP {
    public function __construct() {
        add_action("admin_init", array($this, "add_resources"));
        add_action("admin_menu", array($this, "add_settings_page"));

        $plugin = plugin_basename(__FILE__);
        add_filter("plugin_action_links_{$plugin}", array($this, "render_settings_link"));
    }

    // Add JS and CSS files
    public function add_resources() {
        wp_enqueue_script("hsimp.wordpress.min.js", plugins_url("hsimp.wordpress.min.js", __FILE__), array("jquery"), "0.1", true);
        wp_enqueue_style("hsimp.min.css", plugins_url("hsimp.wordpress.css", __FILE__));
        wp_localize_script("hsimp.wordpress.min.js", "wpHSIMPSettings", $this->get_values());
    }

    private function get_values() {
        return array(
            "calculationsPerSecond" => get_option("hsimp_calculations-per-second") ? get_option("hsimp_calculations-per-second") : "10000000000"
        );
    }

    // Add settings page
    public function add_settings_page() {
        add_options_page(
            "How Secure Is My Password",
            "How Secure Is My Password",
            "read",
            "hsimp-settings",
            array($this, "render_settings_page")
        );
    }

    // Render settings page
    public function render_settings_page() {
        $this->update_options();
        $values = $this->get_values();
    ?>
    <div class="wrap">
        <form action="options-general.php?page=hsimp-settings" method="post" name="options">
            <h2>How Secure Is My Password? Settings</h2>

            <?php echo wp_nonce_field("hsimp-settings") ?>

            <table class="form-table" width="100%" cellpadding="10">
                <tbody>
                    <tr>
                        <th>
                            <label>Calculations Per Second</label>
                        </th>
                        <td>
                            <input type="text" class="regular-text" name="hsimp_calculations-per-second" value="<?php echo $values["calculationsPerSecond"] ?>" />
                        </td>
                    </tr>
                </tbody>
            </table>

            <input type="submit" name="Submit" class="button button-primary" value="Update" />
        </form>
    </div>
    <?php
    }

    // Update options
    private function update_options() {
        if (count($_POST) && wp_verify_nonce($_POST["_wpnonce"], "hsimp-settings")) {
            update_option("hsimp_calculations-per-second", $_POST["hsimp_calculations-per-second"]);
        }
    }

    // Render settings link
    public function render_settings_link($links) {
        $link = '<a href="options-general.php?page=hsimp-settings">Settings</a>';
        array_push($links, $link);
        return $links;
    }
}

new Plugin_HSIMP;