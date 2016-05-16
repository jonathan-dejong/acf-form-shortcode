# acf-form-shortcode
Creates a shortcode for implementing acf_form directly in the editor

## Usage ##
Install as you would any plugin. 
After activation you can now use the `[show_acf_form]` shortcode. It takes *all* options that acf_form takes. To set array values just comma-separate them. To set associative array values use | to separate key=>value pairs.

## Example usage ##
```
[show_acf_form id="tavlingsansokan-form" field_groups="1496,1451" post_id="new_post" new_post="post_type|tavlingsansokningar,post_status|publish" submit_value="Skicka" updated_message="Ansökan mottagen"]
```

## Limitations ##
* The shortcode will only work in the default wysiwyg editor as of now. 
* `acf_form_header()` is automatically added by detecting the shortcode in the post_content so it will only work for single page/post views. To make it work on say an archive you could add the function yourself:
```
<?php if( is_archive() ) acf_form_header(); ?>
```

## Bugs and requests ##
Open up an issue