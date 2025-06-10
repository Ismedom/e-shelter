<x-layouts.web>
    <div class="py-20">
        <form action="{{ route('payment.create') }}" method="POST">
            @csrf
            <input type="number" name="amount" placeholder="Amount" >
            <input type="text" name="customer_name" placeholder="Name" >
            <input type="email" name="customer_email" placeholder="Email" >
            <button type="submit">Pay with ABA</button>
        </form>
    </div>
</x-layouts.web>