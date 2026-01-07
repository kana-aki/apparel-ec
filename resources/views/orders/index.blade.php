<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            購入履歴
        </h2>
    </x-slot>

    <div class="order-history-wrapper">
        <div class="order-history-container">
            <div class="order-history-card">
                <div class="order-history-content">

                    @if($orders->count() === 0)
                        <p class="order-history-empty">
                            購入履歴はまだありません。
                        </p>
                    @else
                        <div class="order-history-list">
                            @foreach($orders as $order)
                                <div class="order-history-item">
                                    <div class="order-history-item-header">
                                        <div class="order-history-item-id">
                                            注文 #{{ $order->id }}
                                        </div>
                                        <div class="order-history-item-date">
                                            {{ optional($order->created_at)->format('Y-m-d H:i') }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="order-history-pagination">
                            {{ $orders->links() }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
