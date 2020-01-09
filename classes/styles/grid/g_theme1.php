<style type="text/css">
/* Style 02 */
#pgcu_style2 .pgcu_post.pgcu_post--style1 {
    border: 1px solid #ebedf2;
    margin-bottom: 30px;
}

#pgcu_style2 .pgcu_post.pgcu_post--style1 .pgcu_post__contents {
    padding: 13px 19px 16px;
}

#pgcu_style2 .pgcu_post.pgcu_post--style1 .pgcu_post__contents .post_info {
    margin-top: 6px;
    margin-bottom: 8px;
}

#pgcu_style2 .pgcu_post.pgcu_post--style1 .pgcu_post__contents .post_info .category::before {
    content: '-';
    margin-right: 3px;
}

#pgcu_style2 .pgcu_post.pgcu_post--style1-grid {
    margin-bottom: 30px;
}
#pgcu_style2 .pgcu_post .post_info ul li,#pgcu_style2 .pgcu_post .post_info ul li a {
    color: <?php echo !empty($meta_data_color) ? $meta_data_color : "#9192a3";?>;
    font-size: <?php echo !empty($meta_data_font_size) ? $meta_data_font_size : "13px";?>;
    margin-left: 0;
    line-height: 19px;
    word-break: break-word;
    padding-left: 0;
    box-shadow: none;
}

#pgcu_style2 .pgcu_post .post_title h4 {
    margin: 0;
    color: <?php echo !empty($post_title_color) ? $post_title_color : "#363940";?>;
    font-size: 20px;
    font-weight: 500;
    text-align: left;
    text-transform: capitalize;
    letter-spacing: 0;
}
#pgcu_style2 .pgcu_post .post_title h4:hover {
    color: <?php echo !empty($post_title_hover_color) ? $post_title_hover_color : "#F42156";?>;
} 
#pgcu_style2 .pgcu_post .post_info ul {
    margin: 0;
    padding: 0;
}
#pgcu_style2 .pgcu_post.pgcu_post--style1 {
    padding:0;
}
#pgcu_style2 .read_more {
    color : <?php echo !empty($read_more_color) ? $read_more_color : "#363940";?>;
}
#pgcu_style2 .read_more:hover {
    color : <?php echo !empty($read_more_hover_color) ? $read_more_hover_color : "#F42156";?>;
    box-shadow: none;
}
#pgcu_style2 p {
    margin-bottom: 15px;
    color: <?php echo !empty($post_content_color) ? $post_content_color : "#6e7387";?>;
    font-size: 15px;
    line-height: 26px;
    font-weight: 100;
    text-align: left;
}
</style>