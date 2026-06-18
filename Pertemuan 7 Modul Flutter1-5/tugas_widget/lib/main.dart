import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});
  
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Tugas Praktikum Modul Flutter',
      theme: ThemeData(
        primarySwatch: Colors.blue,
      ),
      home: const WidgetDemoScreen(),
    );
  }
}

class WidgetDemoScreen extends StatelessWidget {
  const WidgetDemoScreen({super.key});

  @override
  Widget build(BuildContext context) {
    // Data array untuk ListView.builder
    final List<String> builderData = ['Item Array 1', 'Item Array 2', 'Item Array 3', 'Item Array 4'];
    
    // Data array untuk ListView.separated
    final List<String> separatedData = ['Data Satu', 'Data Dua', 'Data Tiga', 'Data Empat'];

    return Scaffold(
      appBar: AppBar(title: const Text('Demo Widget Flutter')),
      body: SingleChildScrollView(
        padding: const EdgeInsets.all(16.0),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            const Text('1. Container', style: TextStyle(fontSize: 18, fontWeight: FontWeight.bold)),
            const SizedBox(height: 8),
            Container(
              width: 100,
              height: 100,
              color: Colors.blueAccent,
              child: const Center(child: Text('Ini Container', style: TextStyle(color: Colors.white), textAlign: TextAlign.center)),
            ),
            const SizedBox(height: 24),

            const Text('2. GridView (min 6 item)', style: TextStyle(fontSize: 18, fontWeight: FontWeight.bold)),
            const SizedBox(height: 8),
            GridView.count(
              shrinkWrap: true,
              physics: const NeverScrollableScrollPhysics(),
              crossAxisCount: 3,
              mainAxisSpacing: 8,
              crossAxisSpacing: 8,
              children: List.generate(6, (index) {
                return Container(
                  color: Colors.orangeAccent,
                  child: Center(child: Text('Grid ${index + 1}', style: const TextStyle(fontWeight: FontWeight.bold))),
                );
              }),
            ),
            const SizedBox(height: 24),

            const Text('3. ListView (3 item: A, B, C)', style: TextStyle(fontSize: 18, fontWeight: FontWeight.bold)),
            const SizedBox(height: 8),
            ListView(
              shrinkWrap: true,
              physics: const NeverScrollableScrollPhysics(),
              children: const [
                ListTile(leading: CircleAvatar(child: Text('A')), title: Text('Item A')),
                ListTile(leading: CircleAvatar(child: Text('B')), title: Text('Item B')),
                ListTile(leading: CircleAvatar(child: Text('C')), title: Text('Item C')),
              ],
            ),
            const SizedBox(height: 24),

            const Text('4. ListView.builder', style: TextStyle(fontSize: 18, fontWeight: FontWeight.bold)),
            const SizedBox(height: 8),
            ListView.builder(
              shrinkWrap: true,
              physics: const NeverScrollableScrollPhysics(),
              itemCount: builderData.length,
              itemBuilder: (context, index) {
                return Card(
                  color: Colors.lightGreen.shade100,
                  child: ListTile(
                    title: Text(builderData[index]),
                    trailing: const Icon(Icons.arrow_forward_ios, size: 16),
                  ),
                );
              },
            ),
            const SizedBox(height: 24),

            const Text('5. ListView.separated', style: TextStyle(fontSize: 18, fontWeight: FontWeight.bold)),
            const SizedBox(height: 8),
            ListView.separated(
              shrinkWrap: true,
              physics: const NeverScrollableScrollPhysics(),
              itemCount: separatedData.length,
              separatorBuilder: (context, index) => const Divider(color: Colors.red, thickness: 2),
              itemBuilder: (context, index) {
                return Padding(
                  padding: const EdgeInsets.symmetric(vertical: 8.0),
                  child: Text('Data: ${separatedData[index]}', style: const TextStyle(fontSize: 16)),
                );
              },
            ),
            const SizedBox(height: 24),

            const Text('6. Stack', style: TextStyle(fontSize: 18, fontWeight: FontWeight.bold)),
            const SizedBox(height: 8),
            Stack(
              alignment: Alignment.center,
              children: [
                Container(
                  width: 200,
                  height: 200,
                  color: Colors.teal,
                ),
                Container(
                  width: 150,
                  height: 150,
                  color: Colors.amber,
                ),
                const Text(
                  'Teks Bertumpuk\ndi atas Kotak',
                  textAlign: TextAlign.center,
                  style: TextStyle(fontSize: 16, fontWeight: FontWeight.bold, color: Colors.black),
                ),
              ],
            ),
            const SizedBox(height: 40),
          ],
        ),
      ),
    );
  }
}
