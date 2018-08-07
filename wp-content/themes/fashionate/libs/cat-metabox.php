<?php
if ( ! class_exists( 'CT_TAX_META' ) ) {

  class CT_TAX_META {

    public function __construct() {
      //
    }

    /*
     * Initialize the class and start calling our hooks and filters
     * @since 1.0.0
    */
    public function init() {
      add_action( 'category_add_form_fields', array ( $this, 'add_category_image' ), 10, 2 );
      add_action( 'created_category', array ( $this, 'save_category_image' ), 10, 2 );
      add_action( 'category_edit_form_fields', array ( $this, 'update_category_image' ), 10, 2 );
      add_action( 'edited_category', array ( $this, 'updated_category_image' ), 10, 2 );
      add_action( 'admin_enqueue_scripts',  array ( $this, 'load_wp_media_files' ) );
      add_action(  'admin_enqueue_scripts', array ( $this, 'add_script' ));
    }

    /*
     * Add a form field in the new category page
     * @since 1.0.0
    */
    public function add_category_image ( $taxonomy ) { ?>
      <div class="form-field term-group">
        <label for="category-image-id"><?php _e('Image', 'fashionate'); ?></label>
        <input type="hidden" id="category-image-id" name="category-image-id" class="custom_media_url" value="">
        <div id="category-image-wrapper"></div>
        <p>
          <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="<?php _e( 'Add Image', 'fashionate' ); ?>" />
          <input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" value="<?php _e( 'Remove Image', 'fashionate' ); ?>" />
        </p>
      </div>
      <?php
    }

    /*
     * Save the form field
     * @since 1.0.0
    */
    public function save_category_image ( $term_id, $tt_id ) {
      if( isset( $_POST['category-image-id'] ) && '' !== $_POST['category-image-id'] ){
        $image = $_POST['category-image-id'];
        add_term_meta( $term_id, 'category-image-id', $image, true );
      }
    }

    /*
     * Edit the form field
     * @since 1.0.0
    */
    public function update_category_image ( $term, $taxonomy ) { ?>
      <tr class="form-field term-group-wrap">
        <th scope="row">
          <label for="category-image-id"><?php _e( 'Image', 'fashionate' ); ?></label>
        </th>
        <td>
          <?php $image_id = get_term_meta ( $term -> term_id, 'category-image-id', true ); ?>
          <input type="hidden" id="category-image-id" name="category-image-id" value="<?php echo $image_id; ?>">
          <div id="category-image-wrapper">
            <?php if ( $image_id ) { ?>
              <?php echo wp_get_attachment_image ( $image_id, 'thumbnail' ); ?>
            <?php } ?>
          </div>
          <p>
            <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="<?php _e( 'Add Image', 'fashionate' ); ?>" />
            <input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" value="<?php _e( 'Remove Image', 'fashionate' ); ?>" />
          </p>
        </td>
      </tr>
      <?php
    }

    /*
     * Update the form field value
     * @since 1.0.0
     */
    public function updated_category_image ( $term_id, $tt_id ) {
      if( isset( $_POST['category-image-id'] ) && '' !== $_POST['category-image-id'] ){
        $image = $_POST['category-image-id'];
        update_term_meta ( $term_id, 'category-image-id', $image );
      } else {
        update_term_meta ( $term_id, 'category-image-id', '' );
      }
    }


    function load_wp_media_files() {
      wp_enqueue_media();
    }

    /*
     * Add script
     * @since 1.0.0
     */
    public function add_script() {


      wp_enqueue_script( 'cat-img-js', get_template_directory_uri() . '/dist/js/cat-img.js', array('jquery'), '20120206', true );


      }

  }

  $CT_TAX_META = new CT_TAX_META();
  $CT_TAX_META -> init();

}



