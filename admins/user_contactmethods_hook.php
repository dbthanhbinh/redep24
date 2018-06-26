<?php
//user_contactmethods_hook
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// functions.php
add_filter( 'user_contactmethods', 'profileContactMethods' );

/**
 * profile contact methods
 *
 * @author  Joe Sexton
 * @param   array $contactMethods
 * @return  array
 */
function profileContactMethods( $contactmethods ) 
{
    $contactmethods['phone']            = 'Phone';
    $contactmethods['phone_2']          = 'Phone 2';
    $contactmethods['shop']             = 'Shop Name';
    $contactmethods['support_name']     = 'Support Customer(full name)';
    $contactmethods['twitter']          = 'Twitter Page';
    $contactmethods['facebook']         = 'Facebook Page';    
    $contactmethods['googleplus']       = 'Google Plus Profile URL';
    $contactmethods['yahoo']            = 'Yahoo Nickname';
    $contactmethods['skype']            = 'Skype Nickname';

    return $contactmethods;
}

// functions.php
 
// render admin profile fields
add_action( 'show_user_profile', 'renderProfileFields' );
add_action( 'edit_user_profile', 'renderProfileFields' );
 
// validate profile fields
add_action( 'user_profile_update_errors', 'validateProfileFields', 10, 3 );
 
// save profile fields
add_action( 'edit_user_profile_update', 'saveProfileFields' );
add_action( 'personal_options_update', 'saveProfileFields' );
 
/**
 * render user profile fields
 *
 * @author  Joe Sexton 
 * @param   WP_User $user
 */
function renderProfileFields( WP_User $user ) { ?>
 
    <h3>Address Infomation</h3>
    <table class="form-table">
        <tr>
            <th><label for="address_info_city">City</label></th>
            <td>
                <select name="address_info_city" id="address_info_city">
                    <?php webseo24h_tie_get_cities_options(get_the_author_meta('address_info_city', $user->ID ));?>
                </select>   
            </td>
        </tr>
        <tr>
            <th><label for="address_info_district">District</label></th>
            <td>
                <input type="text" name="address_info_district" id="address_info_address" value="<?php echo esc_attr( get_the_author_meta( 'address_info_district', $user->ID ) ); ?>" class="regular-text" ><br>
            </td>
        </tr>
        <tr>
            <th><label for="address_info_address">Address</label></th>
            <td>
                <input type="text" name="address_info_address" id="address_info_address" value="<?php echo esc_attr( get_the_author_meta( 'address_info_address', $user->ID ) ); ?>" class="regular-text" >
            </td>
        </tr>
        
    </table>
 
<?php }
 
/**
 * validate profile fields
 *
 * @author  Joe Sexton 
 * @param   WP_Error $errors
 * @param   boolean $update
 * @param   object $user raw user object not a WP_User
 */
function validateProfileFields( WP_Error &$errors, $update, &$user ) {
 
    // validate input fields
    if ( !empty( $_POST['address_info_city'] ) && strlen( $_POST['address_info_city'] ) > 255 && !empty( $_POST['address_info_city'] ) )
        $errors->add( 'address_info_city', "<strong>ERROR</strong>: The maximum city length is 255 characters." );
 
    if ( !empty( $_POST['address_info_district'] ) && strlen( $_POST['address_info_district'] ) > 255 && !empty( $_POST['address_info_district'] ) )
        $errors->add( 'address_info_district', "<strong>ERROR</strong>: The maximum District length is 255 characters." );
    
    if ( !empty( $_POST['address_info_address'] ) && strlen( $_POST['address_info_address'] ) > 255 && !empty( $_POST['address_info_address'] ) )
        $errors->add( 'address_info_address', "<strong>ERROR</strong>: The maximum Address length is 255 characters." );
 
    return $errors;
}
 
/**
 * save profile fields
 *
 * @author  Joe Sexton 
 * @param   int $id
 */
function saveProfileFields( $id ) 
{
 
    if ( !current_user_can( 'edit_user', $id ) )
        return false;
 
    if ( isset( $_POST['address_info_city'] ) )
        update_user_meta( $id, 'address_info_city', $_POST['address_info_city'] );
 
    if ( isset( $_POST['address_info_district'] ) )
        update_user_meta( $id, 'address_info_district', $_POST['address_info_district'] );
    
    if ( isset( $_POST['address_info_address'] ) )
        update_user_meta( $id, 'address_info_address', $_POST['address_info_address'] );
}

