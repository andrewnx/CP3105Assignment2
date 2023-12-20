<?php
/**
 * Add new Element
 *
 * @package     Wow_Plugin
 * @subpackage  Admin/Add_Item
 * @author      Wow-Company <helper@wow-company.com>
 * @copyright   2019 Wow-Company
 * @license     GNU Public License
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// include the database params for item
include_once( 'settings/database.php' );

// include the options param
include_once( 'settings/options/general.php' );

$url_form = admin_url() . 'admin.php?page=' . $this->plugin['slug'];
?>
    <form action="<?php echo esc_url( $url_form ); ?>" method="post" name="post" class="wow-plugin" id="wow-plugin">
        <div id="poststuff">
            <div id="post-body" class="metabox-holder columns-2">
                <div id="post-body-content" style="position: relative;">

                    <div id="titlediv">

                        <div id="titlewrap">
                            <label class="screen-reader-text" id="title-prompt-text" for="title">Enter title
                                here</label>
                            <input type="text" class="input" name="title" size="30"
                                   value="<?php echo esc_attr( $title ); ?>" id="title"
                                   placeholder="<?php esc_attr_e( 'Register an menu name', 'floating-button' ); ?>"
                                   autocomplete="off">
                        </div>

                    </div>
                </div>

                <!--      Sidebar with the setting-->
                <div id="postbox-container-1" class="postbox-container">

                    <div id="submitdiv" class="box">
                        <h2 class="has-border-bottom">
							<?php esc_html_e( 'Publish', 'floating-button' ); ?>
                        </h2>

                        <div class="inside">
                            <div class="columns is-multiline">
                                <div class="column is-12">
                                    <div class="field">
                                        <label class="checkbox label">
											<?php self::option( $menu_status ); ?><?php esc_attr_e( "Activated", 'floating-button' ); ?><?php self::tooltip( $menu_status_help ); ?>
                                        </label>
                                    </div>
                                    <div class="field">
                                        <label class="checkbox label">
											<?php self::option( $test_mode ); ?><?php esc_attr_e( "Test mode", 'floating-button' ); ?><?php self::tooltip( $test_mode_help ); ?>
                                        </label>
                                    </div>

                                </div>
                                <div class="column is-12">
                                    <div class="field">
										<?php self::option( $show ); ?>
                                    </div>
                                    <span id="shortcode">
                                      <code>[<?php echo $this->plugin['shortcode']; ?> id="<?php echo $tool_id; ?>"]</code>
                                    </span>
                                </div>
                            </div>

                            <div class="submitbox has-border-top" id="submitpost">
                                <div id="delete-action">
									<?php if ( ! empty( $id ) ) : ?><?php $delete_url = admin_url() . 'admin.php?page=' . $this->plugin['slug'] . '&info=delete&did=' . absint( $id ); ?>
                                        <a class="submitdelete deletion"
                                           href="<?php echo esc_url( $delete_url ); ?>"><?php esc_attr_e( 'Delete', 'floating-button' ); ?></a>
									<?php endif; ?>
                                </div>

                                <div id="publishing-action">
                                    <span class="saving"><?php esc_html_e( 'Saving', 'floating-button' ); ?></span>
                                    <input name="submit" id="submit" class="button button-primary button-large"
                                           value="<?php echo esc_attr( $btn ); ?>" type="submit">
                                </div>

                                <div class="clear"></div>


                            </div>
                        </div>
                    </div>
                    <div class="ribbon">
                        UPGRADE PRO
                        <i></i>
                        <i></i>
                        <i></i>
                        <i></i>
                    </div>
                    <div class="upgrade-box">
                        <a class="button is-demo" href="https://wow-company.com/floating-button-pro/" target="_blank">Demo</a>
                        <a class="button is-upgrade" href="https://wow-estore.com/item/floating-button-pro/" target="_blank">Upgrade</a>

                    </div>
                </div>

                <!--      Block for main options pages-->
                <div id="postbox-container-2" class="postbox-container">
                    <div id="postoptions" class="box">

                        <div class="columns">
                            <div class="column has-tabs">
                                <div class="tabs is-vertical" id="tab">
                                    <ul>
                                        <li class="is-active" data-tab="1">
                                            <a><?php esc_html_e( 'Main', 'floating-button' ); ?></a>
                                        </li>

                                        <li data-tab="2">
                                            <a><?php esc_html_e( 'Sub Buttons 1', 'floating-button' ); ?></a>
                                        </li>

                                        <li data-tab="3">
                                            <a><?php esc_html_e( 'Sub Buttons 2', 'floating-button' ); ?></a>
                                        </li>

                                        <li data-tab="4">
                                            <a><?php esc_html_e( 'Display', 'floating-button' ); ?></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="column has-border-left">

                                <div id="tab-content" class="inside">

                                    <div class="tab-content" data-content="1">
		                                <?php include_once( 'settings/main.php' ); ?>
                                    </div>

                                    <div class="tab-content is-hidden" data-content="2">
		                                <?php include_once( 'settings/vertical.php' ); ?>
                                    </div>

                                    <div class="tab-content is-hidden" data-content="3">
		                                <?php include_once( 'settings/horizontal.php' ); ?>
                                    </div>

                                    <div class="tab-content is-hidden is-zebra" data-content="4">
										<?php include_once( 'settings/display.php' ); ?>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>

        <!--  main param for adding in database-->
        <input type="hidden" name="tool_id" value="<?php echo absint( $tool_id ); ?>" id="tool_id"/>
        <input type="hidden" name="add" id="add_action" value="<?php echo absint( $add_action ); ?>"/>
        <input type="hidden" name="prefix" value="<?php echo esc_attr( $this->plugin['prefix'] ); ?>" id="prefix"/>
	    <?php wp_nonce_field( $this->plugin['slug'] . '_action', $this->plugin['slug'] . '_nonce' ); ?>
    </form>


		<?php include_once( 'settings/clone.php' ); ?>

<?php
