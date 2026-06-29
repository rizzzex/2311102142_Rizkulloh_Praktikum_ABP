import 'package:flutter/material.dart';
import 'package:flutter_bloc/flutter_bloc.dart';
import 'bloc/cart_cubit.dart';
import 'models/product.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return BlocProvider(
      create: (context) => CartCubit(),
      child: MaterialApp(
        title: 'Flutter BLoC Cart',
        theme: ThemeData(
          primarySwatch: Colors.blue,
        ),
        home: const ProductListPage(),
      ),
    );
  }
}

class ProductListPage extends StatelessWidget {
  const ProductListPage({Key? key}) : super(key: key);

  final List<Product> products = const [
    Product(id: '1', name: 'Laptop', price: 1000.0),
    Product(id: '2', name: 'Smartphone', price: 500.0),
    Product(id: '3', name: 'Headphones', price: 100.0),
    Product(id: '4', name: 'Keyboard', price: 50.0),
    Product(id: '5', name: 'Mouse', price: 25.0),
  ];

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Daftar Produk'),
        actions: [
          Stack(
            alignment: Alignment.center,
            children: [
              IconButton(
                icon: const Icon(Icons.shopping_cart),
                onPressed: () {
                  Navigator.push(
                    context,
                    MaterialPageRoute(builder: (context) => const CartPage()),
                  );
                },
              ),
              Positioned(
                right: 8,
                top: 8,
                child: BlocBuilder<CartCubit, CartState>(
                  builder: (context, state) {
                    if (state.totalItems > 0) {
                      return Container(
                        padding: const EdgeInsets.all(2),
                        decoration: BoxDecoration(
                          color: Colors.red,
                          borderRadius: BorderRadius.circular(10),
                        ),
                        constraints: const BoxConstraints(
                          minWidth: 16,
                          minHeight: 16,
                        ),
                        child: Text(
                          '${state.totalItems}',
                          style: const TextStyle(
                            color: Colors.white,
                            fontSize: 10,
                          ),
                          textAlign: TextAlign.center,
                        ),
                      );
                    }
                    return const SizedBox.shrink();
                  },
                ),
              )
            ],
          ),
        ],
      ),
      body: ListView.builder(
        itemCount: products.length,
        itemBuilder: (context, index) {
          final product = products[index];
          return Card(
            margin: const EdgeInsets.symmetric(horizontal: 10, vertical: 5),
            child: ListTile(
              title: Text(product.name),
              subtitle: Text('\$${product.price}'),
              trailing: IconButton(
                icon: const Icon(Icons.add_shopping_cart),
                onPressed: () {
                  context.read<CartCubit>().addProduct(product);
                  ScaffoldMessenger.of(context).showSnackBar(
                    SnackBar(
                      content: Text('${product.name} ditambahkan ke keranjang!'),
                      duration: const Duration(seconds: 1),
                    ),
                  );
                },
              ),
            ),
          );
        },
      ),
    );
  }
}

class CartPage extends StatelessWidget {
  const CartPage({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Keranjang Belanja'),
      ),
      body: BlocBuilder<CartCubit, CartState>(
        builder: (context, state) {
          if (state.cartItems.isEmpty) {
            return const Center(
              child: Text('Keranjang Anda kosong.'),
            );
          }
          return ListView.builder(
            itemCount: state.cartItems.length,
            itemBuilder: (context, index) {
              final product = state.cartItems[index];
              return ListTile(
                title: Text(product.name),
                subtitle: Text('\$${product.price}'),
                trailing: IconButton(
                  icon: const Icon(Icons.remove_circle_outline, color: Colors.red),
                  onPressed: () {
                    context.read<CartCubit>().removeProduct(product);
                  },
                ),
              );
            },
          );
        },
      ),
    );
  }
}
