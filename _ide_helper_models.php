<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Design> $designs
 * @property-read int|null $designs_count
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\CartFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereUserId($value)
 */
	class Cart extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $cart_id
 * @property int $design_id
 * @property int $quantity
 * @property int $isChecked
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\CartDesignFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartDesign newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartDesign newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartDesign query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartDesign whereCartId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartDesign whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartDesign whereDesignId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartDesign whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartDesign whereIsChecked($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartDesign whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartDesign whereUpdatedAt($value)
 */
	class CartDesign extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $product_id
 * @property string $name
 * @property string $slug
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Design> $designs
 * @property-read int|null $designs_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OptionValue> $optionValues
 * @property-read int|null $option_values_count
 * @property-read \App\Models\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $buyer_id
 * @property int $seller_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $buyer
 * @property-read \App\Models\Design|null $design
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ChatMessage> $messages
 * @property-read int|null $messages_count
 * @property-read \App\Models\User $seller
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Chat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Chat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Chat query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Chat whereBuyerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Chat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Chat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Chat whereSellerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Chat whereUpdatedAt($value)
 */
	class Chat extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $chat_id
 * @property int $sender_id
 * @property string $message_text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Chat $chat
 * @property-read \App\Models\User $sender
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChatMessage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChatMessage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChatMessage query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChatMessage whereChatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChatMessage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChatMessage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChatMessage whereMessageText($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChatMessage whereSenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChatMessage whereUpdatedAt($value)
 */
	class ChatMessage extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $design_id
 * @property int $user_id
 * @property string $comment_text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Design $design
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Reply> $replies
 * @property-read int|null $replies_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comment query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comment whereCommentText($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comment whereDesignId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comment whereUserId($value)
 */
	class Comment extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $seller_id
 * @property int $product_id
 * @property int $category_id
 * @property string $title
 * @property string $slug
 * @property string|null $image
 * @property int $price
 * @property int $stock
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Cart> $carts
 * @property-read int|null $carts_count
 * @property-read \App\Models\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OptionValue> $options
 * @property-read int|null $options_count
 * @property-read \App\Models\Product $product
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DesignReview> $reviews
 * @property-read int|null $reviews_count
 * @property-read \App\Models\User $seller
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Transaction> $transactions
 * @property-read int|null $transactions_count
 * @method static \Database\Factories\DesignFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Design findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Design newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Design newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Design query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Design whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Design whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Design whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Design whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Design whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Design wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Design whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Design whereSellerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Design whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Design whereStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Design whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Design whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Design withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 */
	class Design extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $design_id
 * @property int $option_value_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product $design
 * @property-read \App\Models\OptionValue $optionValue
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DesignOption newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DesignOption newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DesignOption query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DesignOption whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DesignOption whereDesignId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DesignOption whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DesignOption whereOptionValueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DesignOption whereUpdatedAt($value)
 */
	class DesignOption extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $design_id
 * @property int $user_id
 * @property int $rating
 * @property string|null $feedback
 * @property int $isRated
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Design $design
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DesignReview newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DesignReview newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DesignReview query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DesignReview whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DesignReview whereDesignId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DesignReview whereFeedback($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DesignReview whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DesignReview whereIsRated($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DesignReview whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DesignReview whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DesignReview whereUserId($value)
 */
	class DesignReview extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $medially_type
 * @property int $medially_id
 * @property string $file_url
 * @property string $file_name
 * @property string|null $file_type
 * @property int $size
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $medially
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media whereFileType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media whereFileUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media whereMediallyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media whereMediallyType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media whereUpdatedAt($value)
 */
	class Media extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OptionValue> $values
 * @property-read int|null $values_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Option findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Option newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Option newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Option query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Option whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Option whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Option whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Option whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Option whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Option withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 */
	class Option extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $option_id
 * @property int|null $category_id
 * @property string $value
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category|null $category
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DesignOption> $designOptions
 * @property-read int|null $design_options_count
 * @property-read \App\Models\Option $option
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OptionValue findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OptionValue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OptionValue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OptionValue query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OptionValue whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OptionValue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OptionValue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OptionValue whereOptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OptionValue whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OptionValue whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OptionValue whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OptionValue withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 */
	class OptionValue extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $transaction_id
 * @property int $payment_method_id
 * @property int $amount
 * @property string $payment_status
 * @property string|null $payment_time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\PaymentMethod $paymentMethod
 * @property-read \App\Models\Transaction $transaction
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment wherePaymentMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment wherePaymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment wherePaymentTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereUpdatedAt($value)
 */
	class Payment extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Payment> $payments
 * @property-read int|null $payments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SubscriptionPayment> $subscriptionPayments
 * @property-read int|null $subscription_payments_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentMethod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentMethod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentMethod query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentMethod whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentMethod whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentMethod whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentMethod whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentMethod whereUpdatedAt($value)
 */
	class PaymentMethod extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $description
 * @property int $price
 * @property string $billing_cycle
 * @property string|null $features
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Promotion> $promotions
 * @property-read int|null $promotions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Subscription> $subscriptions
 * @property-read int|null $subscriptions_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Plan findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Plan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Plan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Plan query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Plan whereBillingCycle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Plan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Plan whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Plan whereFeatures($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Plan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Plan whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Plan wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Plan whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Plan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Plan withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 */
	class Plan extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category> $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Design> $designs
 * @property-read int|null $designs_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Option> $options
 * @property-read int|null $options_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Promotion> $promotions
 * @property-read int|null $promotions_count
 * @method static \Database\Factories\ProductFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string|null $description
 * @property string|null $image
 * @property int $price
 * @property int|null $original_price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Plan> $plans
 * @property-read int|null $plans_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Transaction> $transactions
 * @property-read int|null $transactions_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Promotion findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Promotion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Promotion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Promotion query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Promotion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Promotion whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Promotion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Promotion whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Promotion whereOriginalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Promotion wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Promotion whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Promotion whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Promotion whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Promotion withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 */
	class Promotion extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int|null $comment_id
 * @property int|null $parent_id
 * @property int $user_id
 * @property string $reply_text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Comment|null $comment
 * @property-read Reply|null $parentReply
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reply newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reply newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reply query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reply whereCommentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reply whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reply whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reply whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reply whereReplyText($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reply whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reply whereUserId($value)
 */
	class Reply extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $transaction_id
 * @property int $shipping_method_id
 * @property string $shipping_status
 * @property string|null $tracking_number
 * @property string|null $shipping_time
 * @property string|null $delivery_time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ShippingMethod $shippingMethod
 * @property-read \App\Models\Transaction $transaction
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipping newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipping newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipping query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipping whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipping whereDeliveryTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipping whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipping whereShippingMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipping whereShippingStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipping whereShippingTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipping whereTrackingNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipping whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipping whereUpdatedAt($value)
 */
	class Shipping extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int|null $shipping_fee
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Shipping> $shippings
 * @property-read int|null $shippings_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod whereShippingFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod whereUpdatedAt($value)
 */
	class ShippingMethod extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $plan_id
 * @property string $status
 * @property string $start_date
 * @property string|null $end_date
 * @property int $auto_renew
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Plan $plan
 * @property-read \App\Models\SubscriptionPayment|null $subscriptionPayment
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subscription newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subscription newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subscription query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subscription whereAutoRenew($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subscription whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subscription whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subscription whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subscription wherePlanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subscription whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subscription whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subscription whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subscription whereUserId($value)
 */
	class Subscription extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $subscription_id
 * @property int $payment_method_id
 * @property int $amount
 * @property string $payment_status
 * @property string|null $payment_time
 * @property string|null $snap_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\PaymentMethod $paymentMethod
 * @property-read \App\Models\Subscription $subscription
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SubscriptionPayment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SubscriptionPayment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SubscriptionPayment query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SubscriptionPayment whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SubscriptionPayment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SubscriptionPayment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SubscriptionPayment wherePaymentMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SubscriptionPayment wherePaymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SubscriptionPayment wherePaymentTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SubscriptionPayment whereSnapToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SubscriptionPayment whereSubscriptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SubscriptionPayment whereUpdatedAt($value)
 */
	class SubscriptionPayment extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $order_number
 * @property int $buyer_id
 * @property int $seller_id
 * @property int $total_price
 * @property int $service_fee
 * @property int $grand_total_price
 * @property string $transaction_status
 * @property int $isReceived
 * @property string|null $notes
 * @property string|null $snap_token
 * @property string|null $completion_time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $buyer
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Design> $designs
 * @property-read int|null $designs_count
 * @property-read \App\Models\Payment|null $payment
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Promotion> $promotions
 * @property-read int|null $promotions_count
 * @property-read \App\Models\User $seller
 * @property-read \App\Models\Shipping|null $shipping
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereBuyerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereCompletionTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereGrandTotalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereIsReceived($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereOrderNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereSellerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereServiceFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereSnapToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereTotalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereTransactionStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereUpdatedAt($value)
 */
	class Transaction extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $transaction_id
 * @property int $design_id
 * @property int $quantity
 * @property int $sub_total_price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Design $design
 * @property-read \App\Models\Transaction $transaction
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionDesign newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionDesign newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionDesign query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionDesign whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionDesign whereDesignId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionDesign whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionDesign whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionDesign whereSubTotalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionDesign whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionDesign whereUpdatedAt($value)
 */
	class TransactionDesign extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $transaction_id
 * @property int $promotion_id
 * @property int $quantity
 * @property int $sub_total_price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Promotion $promotion
 * @property-read \App\Models\Transaction $transaction
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionPromotion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionPromotion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionPromotion query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionPromotion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionPromotion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionPromotion wherePromotionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionPromotion whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionPromotion whereSubTotalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionPromotion whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionPromotion whereUpdatedAt($value)
 */
	class TransactionPromotion extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $username
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string $dob
 * @property string $gender
 * @property string $address
 * @property string $phoneNumber
 * @property string|null $image
 * @property int $is_admin
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Chat> $buyerChats
 * @property-read int|null $buyer_chats_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Cart> $carts
 * @property-read int|null $carts_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Design> $designs
 * @property-read int|null $designs_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DesignReview> $ratings
 * @property-read int|null $ratings_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Chat> $sellerChats
 * @property-read int|null $seller_chats_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Subscription> $subscriptions
 * @property-read int|null $subscriptions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Transaction> $transactions
 * @property-read int|null $transactions_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereIsAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUsername($value)
 */
	class User extends \Eloquent {}
}

