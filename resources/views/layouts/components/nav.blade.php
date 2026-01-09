<div class="baseNav">
    <a href="/">Home</a>
    <a href="/auctions">Auctions</a>
    <a href="/search">Search</a>
    <a href="/sell">Sell</a>
    <a href="/contact">Contact</a>
    <a href="/account">Account</a>
</div>

@if (session('access_level') == 2)
    <div class="adminNav">
        <a href="/admin/">Admin Home</a>
        <a href="/admin/lot/create">Create Lot</a>
        <a href="/admin/account">Admin Account</a>
    </div>
@endif
