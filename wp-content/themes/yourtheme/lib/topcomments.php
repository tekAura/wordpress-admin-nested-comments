<?php
/**
 * Start Nested Admin Comments.
 *
 */
$getting_children = FALSE;

add_action( 'current_screen', 'comments_exclude_lazy_hook', 10, 2 );

/**
 * Delay hooking our clauses filter to ensure it's only applied when needed.
 */
function comments_exclude_lazy_hook( $screen )
{
    if ( $screen->id != 'edit-comments' )
        return;

    // Check if our Query Var is defined    
    if( isset( $_GET['top_comments'] ) )
        add_action( 'pre_get_comments', 'list_top_comments', 10, 1 );

    add_filter( 'comment_status_links', 'new_comments_page_link' );
}

/**
 * Only display top_comments
 */ 
function list_top_comments( $clauses )
{
	global $getting_children;
	if ( $getting_children == FALSE ) {
    	$clauses->query_vars['parent'] = "0";
	}
}

/**
 * Add link to top comments with counter
 */
function new_comments_page_link( $status_links )
{
    $count = get_comments( 'parent="0"&count=1' );

    if( isset( $_GET['top_comments'] ) ) 
    {
        $status_links['all'] = '<a href="edit-comments.php?comment_status=all">All</a>';
        $status_links['hello'] = '<a href="edit-comments.php?comment_status=all&top_comments=1" class="current">Top Comments ('.$count.')</a>';
    } 
    else 
    {
        $status_links['hello'] = '<a href="edit-comments.php?comment_status=all&top_comments=1">Top Comments ('.$count.')</a>';
    }

    return $status_links;
}