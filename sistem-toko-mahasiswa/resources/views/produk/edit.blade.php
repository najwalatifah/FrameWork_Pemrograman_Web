<h2>Edit Produk</h2>
<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Nama:</label><br>
    <input type="text" name="name" value="{{ $product->name }}"><br>
    <label>Harga:</label><br>
    <input type="number" name="price" value="{{ $product->price }}"><br>
    <label>Stok:</label><br>
    <input type="number" name="stock" value="{{ $product->stock }}"><br><br>
    <button type="submit">Update</button>
</form>