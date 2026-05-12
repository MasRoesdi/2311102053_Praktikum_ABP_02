import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  // This widget is the root of your application.
  @override
  Widget build(BuildContext context) {
    // Inti dari aplikasi, semacam template untuk halaman-halaman selanjutnya
    // Berisi tema warna aplikasi dan judul
    return MaterialApp(
      title: 'Flutter Demo',
      theme: ThemeData(
        colorScheme: ColorScheme.fromSeed(seedColor: Colors.deepPurple),
      ),
      home: const MyHomePage(title: 'Aplikasi Tugas Kasman'),
    );
  }
}

class MyHomePage extends StatefulWidget {
  const MyHomePage({super.key, required this.title});

  final String title;

  @override
  State<MyHomePage> createState() => _MyHomePageState();
}

class _MyHomePageState extends State<MyHomePage> {
  @override
  Widget build(BuildContext context) {
    // Inti dari
    return Scaffold(
      appBar: AppBar(
        backgroundColor: Theme.of(context).colorScheme.inversePrimary,
        title: Text(widget.title),
      ),
      body: Center(
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.center,
            children: [
              // GridView dengan Container berwarna
              GridView(
                  shrinkWrap: true,
                  physics: const NeverScrollableScrollPhysics(),
                  gridDelegate: const SliverGridDelegateWithFixedCrossAxisCount(crossAxisCount: 4),
                  children: [
                    for (int i = 0; i < 6; i++)
                      Container(
                        padding: const EdgeInsets.all(16),
                        margin: const EdgeInsets.all(8),
                        decoration: BoxDecoration(
                          color: Colors.blue[100],
                          borderRadius: BorderRadius.circular(4)
                        ),
                        child: Text("Tugas $i"),
                      )
                  ],
              ),
              // ListView dengan Container berwarna
              // Arah scroll ke samping, dan isi list berupa Widget Stack
              SizedBox(
                height: 100,
                child: ListView(
                  shrinkWrap: true,
                  scrollDirection: Axis.horizontal,
                  children: [
                    for (int i = 0; i < 3; i++)
                      // Stack berisi 2 kotak dengan warna yang berbeda
                      // Item disusun ke kanan untuk efek shadow
                      Stack(
                        alignment: AlignmentGeometry.centerRight,
                        children: [
                          Container(
                            padding: const EdgeInsets.symmetric(vertical: 16, horizontal: 20),
                            margin: const EdgeInsets.all(8),
                            decoration: BoxDecoration(
                                color: Colors.red[200],
                                borderRadius: BorderRadius.circular(16)
                            ),
                            child: Text("Deadline $i"),
                          ),
                          Container(
                            padding: const EdgeInsets.all(16),
                            margin: const EdgeInsets.all(8),
                            decoration: BoxDecoration(
                                color: Colors.red[100],
                                borderRadius: BorderRadius.circular(16)
                            ),
                            child: Text("Deadline $i"),
                          ),
                          ]
                      )
                  ]
                ),
              ),
              // ListView.builder dengan Container berwarna
              // List yang arah scroll-nya ke samping
              SizedBox(
                height: 100,
                child: ListView.builder(
                  itemCount: 3,
                  scrollDirection: Axis.horizontal,
                  itemBuilder: (context, index) {
                return Container(
                  width: 150,
                  padding: const EdgeInsets.all(16),
                  margin: const EdgeInsets.all(8),
                  decoration: BoxDecoration(
                      color: Colors.yellow[100],
                      borderRadius: BorderRadius.circular(4)
                  ),
                  child: Text("Berita $index"),
                );
              }),
              ),
              // ListView.separated dengan Container berwarna
              // Arah scroll ke bawah, dengan separator (pembatas) berupa garis
              ListView.separated(
                  shrinkWrap: true,
                  physics: const NeverScrollableScrollPhysics(),
                  itemBuilder: (context, index) {
                return Container(
                  padding: const EdgeInsets.all(16),
                  margin: const EdgeInsets.all(8),
                  decoration: BoxDecoration(
                      color: Colors.green[100],
                      borderRadius: BorderRadius.circular(4)
                  ),
                  child: Text("Permintaan $index"),
                );
              }, separatorBuilder: (context, index) {
                return Divider();
              }, itemCount: 3),
            ],
          ),
      )
    );
  }
}
