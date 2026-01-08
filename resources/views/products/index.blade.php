<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            商品一覧
        </h2>
    </x-slot>

    <div class="product-index-wrapper">
        <div class="product-index-container">

            @if($products->count() === 0)
                <div class="product-index-empty-card">
                    <p class="product-index-empty-text">商品はまだありません。</p>
                </div>
            @else
                <div class="product-index-grid">
                    @foreach($products as $product)
                        <div class="product-card">

                            {{-- 画像 --}}
                            @if($product->main_image_path)
                                <img
                                    src="{{ asset('storage/'.$product->main_image_path) }}"
                                    alt="{{ $product->name }}"
                                    class="product-card-image"
                                >
                            @else
                                <div class="product-card-image-placeholder">
                                    No Image
                                </div>
                            @endif

                            <div class="product-card-body">
                                <div class="product-card-name">
                                    {{ $product->name }}
                                </div>

                                <div class="product-card-price">
                                    ¥{{ number_format($product->base_price) }}
                                </div>

                                <button class="product-card-button" disabled>
                                    詳細（後で実装）
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="order-history-pagination">
                    {{ $products->links() }}
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
