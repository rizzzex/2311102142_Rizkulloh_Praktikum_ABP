import 'package:flutter_bloc/flutter_bloc.dart';
import '../models/product.dart';

part 'cart_state.dart';

class CartCubit extends Cubit<CartState> {
  CartCubit() : super(const CartState([]));

  void addProduct(Product product) {
    final updatedCart = List<Product>.from(state.cartItems)..add(product);
    emit(CartState(updatedCart));
  }

  void removeProduct(Product product) {
    final updatedCart = List<Product>.from(state.cartItems)..remove(product);
    emit(CartState(updatedCart));
  }
}
