part of 'cart_cubit.dart';

class CartState {
  final List<Product> cartItems;

  const CartState(this.cartItems);

  int get totalItems => cartItems.length;
}
