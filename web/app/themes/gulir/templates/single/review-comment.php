<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

global $post;
$gulir_class_name   = 'comment-holder';
$gulir_hide_comment = gulir_get_option( 'single_post_comment_button' );

if ( gulir_is_amp() ) {
	$gulir_hide_comment = false;
}
if ( $gulir_hide_comment ) {
	$gulir_class_name .= ' is-hidden';
}
if ( ! get_comments_number() ) {
	$gulir_class_name .= ' no-comment';
}
?>
<div id="rb-user-reviews-<?php echo get_the_ID(); ?>" class="comment-box-wrap entry-sec rb-user-reviews">
	<div class="comment-box-header">
		<?php if ( $gulir_hide_comment ) :
			$review_link = '#';
			if ( gulir_is_amp() ) {
				$review_link = get_comments_link( $post );
				$review_link = add_query_arg( 'noamp', 'mobile', $review_link );
			}
			?><span class="comment-box-title h3"><i class="rbi rbi-feedback"></i><span class="is-invisible"><?php echo gulir_get_review_heading( get_the_ID() ); ?></span></span>
			<a href="<?php echo esc_url( $review_link ); ?>" class="show-post-comment"><i class="rbi rbi-feedback"></i><?php echo gulir_get_review_heading( get_the_ID() ); ?></a>
		<?php else: ?>
			<span class="h3"><i class="rbi rbi-feedback"></i><?php echo gulir_get_review_heading( get_the_ID() ); ?></span>
		<?php endif; ?>
	</div>
	<div class="<?php echo strip_tags( $gulir_class_name ); ?>">
		<?php if ( comments_open() || pings_open() ) : ?>
			<div id="comments" class="comments-area rb-reviews-area">
				<?php if ( have_comments() ) : ?>
					<div class="rb-review-list rb-section">
						<ul class="comment-list entry"><?php wp_list_comments( [ 'callback' => 'gulir_user_review_list' ] ); ?></ul>
						<?php the_comments_pagination( [
								'prev_text' => '<span class="nav-previous">' . gulir_html__( 'Older Reviews', 'gulir' ) . '</span>',
								'next_text' => '<span class="nav-next">' . gulir_html__( 'Newer Reviews', 'gulir' ) . '</span>',
							]
						); ?>
					</div>
				<?php endif;
				if ( ! comments_open() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
					<p class="no-comments"><?php echo gulir_html__( 'Review Closed!', 'gulir' ); ?></p>
				<?php endif; ?>
				<div class="comment-box-content rb-reviews-form">
					<?php
					$commenter    = wp_get_current_commenter();
					$comment_form = [
						'title_reply'    => gulir_html__( 'Leave a Review', 'gulir' ),
						'title_reply_to' => gulir_html__( 'Leave a Reply', 'gulir' ),
						'label_submit'   => gulir_html__( 'Post a Review', 'gulir' ),
					];

					$name_email_required = (bool) get_option( 'require_name_email', 1 );
					$fields              = [
						'author' => [
							'label'    => gulir_html__( 'Your name', 'gulir' ),
							'type'     => 'text',
							'value'    => $commenter['comment_author'],
							'required' => $name_email_required,
						],
						'email'  => [
							'label'    => gulir_html__( 'Your Email', 'gulir' ),
							'type'     => 'email',
							'value'    => $commenter['comment_author_email'],
							'required' => $name_email_required,
						],
						'url'    => [
							'label' => gulir_html__( 'Your website', 'gulir' ),
							'type'  => 'email',
							'value' => $commenter['comment_author_url'],
						],
					];

					$fields                 = apply_filters( 'comment_form_default_fields', $fields, 10 );
					$comment_form['fields'] = [];
					foreach ( $fields as $key => $field ) {
						$field_html = '<p class="comment-form-' . esc_attr( $key ) . '">';
						$field_html .= '<label for="' . esc_attr( $key ) . '">' . gulir_strip_tags( $field['label'] );
						if ( ! empty( $field['required'] ) && $field['required'] ) {
							$field_html .= '&nbsp;<span class="required">*</span>';
						}
						$field_html                     .= '</label><input placeholder="' . esc_attr( $field['label'] ) . '" id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" type="' . esc_attr( $field['type'] ) . '" value="' . esc_attr( $field['value'] ) . '" size="30" ' . ( ( ! empty( $field['required'] ) && $field['required'] ) ? 'required' : '' ) . ' /></p>';
						$comment_form['fields'][ $key ] = $field_html;
						$comment_form['comment_field']  = '<div class="rb-form-rating">
							<span class="rating-alert is-hidden">' . gulir_html__( 'Please select a rating!', 'gulir' ) . '</span>
							<label for="rating-' . get_the_ID() . '">' . gulir_html__( 'Your Rating', 'gulir' ) . '</label>
							<select name="rbrating" id="rating-' . get_the_ID() . '" class="rb-rating-selection">
								<option value="" selected>' . esc_html__( 'Rate&hellip;', 'gulir' ) . '</option>
								<option value="5">' . esc_html__( 'Perfect', 'gulir' ) . '</option>
								<option value="4">' . esc_html__( 'Good', 'gulir' ) . '</option>
								<option value="3">' . esc_html__( 'Average', 'gulir' ) . '</option>
								<option value="2">' . esc_html__( 'Not that Bad', 'gulir' ) . '</option>
								<option value="1">' . esc_html__( 'Very Poor', 'gulir' ) . '</option>
							</select>
							</div>';
						$comment_form['comment_field']  .= '<p class="comment-form-comment"><label for="comment">' . gulir_html__( 'Your Comment', 'gulir' ) . '&nbsp;<span class="required">*</span></label><textarea id="comment" name="comment" placeholder="' . gulir_html__( 'Leave a Comment', 'gulir' ) . '" cols="45" rows="8" required></textarea></p>';
					}
					comment_form( $comment_form ); ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>