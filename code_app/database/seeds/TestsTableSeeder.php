<?php

use Illuminate\Database\Seeder;

class TestsTableSeeder extends Seeder {

    public function run() {
		DB::table('tests')->insert([[
			'task_id' => 1,
			'input' => '1',
			'output' => '1',
			'created_at' => '2020-11-01 00:00:00',
			'updated_at' => '2020-11-01 00:00:00',
		], [
			'task_id' => 1,
			'input' => '25',
			'output' => '25',
			'created_at' => '2020-11-01 00:00:00',
			'updated_at' => '2020-11-01 00:00:00',
		], [
			'task_id' => 1,
			'input' => '50',
			'output' => '50',
			'created_at' => '2020-11-01 00:00:00',
			'updated_at' => '2020-11-01 00:00:00',
		], [
			'task_id' => 1,
			'input' => '100',
			'output' => '100',
			'created_at' => '2020-11-01 00:00:00',
			'updated_at' => '2020-11-01 00:00:00',
		], [
			'task_id' => 2,
			'input' => "3\na b c",
			'output' => "a\nb\nc\n",
			'created_at' => '2020-11-01 00:00:01',
			'updated_at' => '2020-11-01 00:00:01',
		], [
			'task_id' => 2,
			'input' => "1\na",
			'output' => "a\n",
			'created_at' => '2020-11-01 00:00:01',
			'updated_at' => '2020-11-01 00:00:01',
		], [
			'task_id' => 2,
			'input' => "50\na a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a",
			'output' => "a\na\na\na\na\na\na\na\na\na\na\na\na\na\na\na\na\na\na\na\na\na\na\na\na\na\na\na\na\na\na\na\na\na\na\na\na\na\na\na\na\na\na\na\na\na\na\na\na\na\n",
			'created_at' => '2020-11-01 00:00:01',
			'updated_at' => '2020-11-01 00:00:01',
		], [
			'task_id' => 2,
			'input' => "100\nA A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A A",
			'output' => "A\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\n",
			'created_at' => '2020-11-01 00:00:01',
			'updated_at' => '2020-11-01 00:00:01',
		], [
			'task_id' => 3,
			'input' => '1',
			'output' => "1\n",
			'created_at' => '2020-11-01 00:00:02',
			'updated_at' => '2020-11-01 00:00:02',
		], [
			'task_id' => 3,
			'input' => '25',
			'output' => "1\n2\n3\n4\n5\n6\n7\n8\n9\n10\n11\n12\n13\n14\n15\n16\n17\n18\n19\n20\n21\n22\n23\n24\n25\n",
			'created_at' => '2020-11-01 00:00:02',
			'updated_at' => '2020-11-01 00:00:02',
		], [
			'task_id' => 3,
			'input' => '50',
			'output' => "1\n2\n3\n4\n5\n6\n7\n8\n9\n10\n11\n12\n13\n14\n15\n16\n17\n18\n19\n20\n21\n22\n23\n24\n25\n26\n27\n28\n29\n30\n31\n32\n33\n34\n35\n36\n37\n38\n39\n40\n41\n42\n43\n44\n45\n46\n47\n48\n49\n50\n",
			'created_at' => '2020-11-01 00:00:02',
			'updated_at' => '2020-11-01 00:00:02',
		], [
			'task_id' => 3,
			'input' => '100',
			'output' => "1\n2\n3\n4\n5\n6\n7\n8\n9\n10\n11\n12\n13\n14\n15\n16\n17\n18\n19\n20\n21\n22\n23\n24\n25\n26\n27\n28\n29\n30\n31\n32\n33\n34\n35\n36\n37\n38\n39\n40\n41\n42\n43\n44\n45\n46\n47\n48\n49\n50\n51\n52\n53\n54\n55\n56\n57\n58\n59\n60\n61\n62\n63\n64\n65\n66\n67\n68\n69\n70\n71\n72\n73\n74\n75\n76\n77\n78\n79\n80\n81\n82\n83\n84\n85\n86\n87\n88\n89\n90\n91\n92\n93\n94\n95\n96\n97\n98\n99\n100\n",
			'created_at' => '2020-11-01 00:00:02',
			'updated_at' => '2020-11-01 00:00:02',
		], [
			'task_id' => 4,
			'input' => '1',
			'output' => 'No',
			'created_at' => '2020-11-01 00:00:03',
			'updated_at' => '2020-11-01 00:00:03',
		], [
			'task_id' => 4,
			'input' => '9',
			'output' => 'No',
			'created_at' => '2020-11-01 00:00:03',
			'updated_at' => '2020-11-01 00:00:03',
		], [
			'task_id' => 4,
			'input' => '10',
			'output' => 'Yes',
			'created_at' => '2020-11-01 00:00:03',
			'updated_at' => '2020-11-01 00:00:03',
		], [
			'task_id' => 4,
			'input' => '100',
			'output' => 'Yes',
			'created_at' => '2020-11-01 00:00:03',
			'updated_at' => '2020-11-01 00:00:03',
		], [
			'task_id' => 5,
			'input' => '3 6',
			'output' => '9',
			'created_at' => '2020-11-01 00:00:04',
			'updated_at' => '2020-11-01 00:00:04',
		], [
			'task_id' => 5,
			'input' => '50 60',
			'output' => '1500',
			'created_at' => '2020-11-01 00:00:04',
			'updated_at' => '2020-11-01 00:00:04',
		], [
			'task_id' => 5,
			'input' => '1 1',
			'output' => '0.5',
			'created_at' => '2020-11-01 00:00:04',
			'updated_at' => '2020-11-01 00:00:04',
		], [
			'task_id' => 5,
			'input' => '100 100',
			'output' => '5000',
			'created_at' => '2020-11-01 00:00:04',
			'updated_at' => '2020-11-01 00:00:04',
		], [
			'task_id' => 6,
			'input' => "5\nH\ne\nl\nl\no\n",
			'output' => 'Hello',
			'created_at' => '2020-11-01 00:00:05',
			'updated_at' => '2020-11-01 00:00:05',
		], [
			'task_id' => 6,
			'input' => "5\nW\no\nr\nl\nd\n",
			'output' => 'World',
			'created_at' => '2020-11-01 00:00:05',
			'updated_at' => '2020-11-01 00:00:05',
		], [
			'task_id' => 6,
			'input' => "1\na\n",
			'output' => 'a',
			'created_at' => '2020-11-01 00:00:05',
			'updated_at' => '2020-11-01 00:00:05',
		], [
			'task_id' => 6,
			'input' => "50\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\nA\n",
			'output' => 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA',
			'created_at' => '2020-11-01 00:00:05',
			'updated_at' => '2020-11-01 00:00:05',
		], [
			'task_id' => 7,
			'input' => '1',
			'output' => '2',
			'created_at' => '2020-11-01 00:00:06',
			'updated_at' => '2020-11-01 00:00:06',
		], [
			'task_id' => 7,
			'input' => '15',
			'output' => '30',
			'created_at' => '2020-11-01 00:00:06',
			'updated_at' => '2020-11-01 00:00:06',
		], [
			'task_id' => 7,
			'input' => '50',
			'output' => '100',
			'created_at' => '2020-11-01 00:00:06',
			'updated_at' => '2020-11-01 00:00:06',
		], [
			'task_id' => 7,
			'input' => '100',
			'output' => '200',
			'created_at' => '2020-11-01 00:00:06',
			'updated_at' => '2020-11-01 00:00:06',
		], [
			'task_id' => 8,
			'input' => '1',
			'output' => "1\n",
			'created_at' => '2020-11-01 00:00:07',
			'updated_at' => '2020-11-01 00:00:07',
		], [
			'task_id' => 8,
			'input' => '15',
			'output' => "1\n2\nFizz\n4\nBuzz\nFizz\n7\n8\nFizz\nBuzz\n11\nFizz\n13\n14\nFizzBuzz\n",
			'created_at' => '2020-11-01 00:00:07',
			'updated_at' => '2020-11-01 00:00:07',
		], [
			'task_id' => 8,
			'input' => '50',
			'output' => "1\n2\nFizz\n4\nBuzz\nFizz\n7\n8\nFizz\nBuzz\n11\nFizz\n13\n14\nFizzBuzz\n16\n17\nFizz\n19\nBuzz\nFizz\n22\n23\nFizz\nBuzz\n26\nFizz\n28\n29\nFizzBuzz\n31\n32\nFizz\n34\nBuzz\nFizz\n37\n38\nFizz\nBuzz\n41\nFizz\n43\n44\nFizzBuzz\n46\n47\nFizz\n49\nBuzz\n",
			'created_at' => '2020-11-01 00:00:07',
			'updated_at' => '2020-11-01 00:00:07',
		], [
			'task_id' => 8,
			'input' => '100',
			'output' => "1\n2\nFizz\n4\nBuzz\nFizz\n7\n8\nFizz\nBuzz\n11\nFizz\n13\n14\nFizzBuzz\n16\n17\nFizz\n19\nBuzz\nFizz\n22\n23\nFizz\nBuzz\n26\nFizz\n28\n29\nFizzBuzz\n31\n32\nFizz\n34\nBuzz\nFizz\n37\n38\nFizz\nBuzz\n41\nFizz\n43\n44\nFizzBuzz\n46\n47\nFizz\n49\nBuzz\nFizz\n52\n53\nFizz\nBuzz\n56\nFizz\n58\n59\nFizzBuzz\n61\n62\nFizz\n64\nBuzz\nFizz\n67\n68\nFizz\nBuzz\n71\nFizz\n73\n74\nFizzBuzz\n76\n77\nFizz\n79\nBuzz\nFizz\n82\n83\nFizz\nBuzz\n86\nFizz\n88\n89\nFizzBuzz\n91\n92\nFizz\n94\nBuzz\nFizz\n97\n98\nFizz\nBuzz\n",
			'created_at' => '2020-11-01 00:00:07',
			'updated_at' => '2020-11-01 00:00:07',
		], [
			'task_id' => 9,
			'input' => '1',
			'output' => "1\n",
			'created_at' => '2020-11-01 00:00:08',
			'updated_at' => '2020-11-01 00:00:08',
		], [
			'task_id' => 9,
			'input' => '15',
			'output' => "1\n1\n2\n3\n5\n8\n13\n21\n34\n55\n89\n144\n233\n377\n610\n",
			'created_at' => '2020-11-01 00:00:08',
			'updated_at' => '2020-11-01 00:00:08',
		], [
			'task_id' => 9,
			'input' => '25',
			'output' => "1\n1\n2\n3\n5\n8\n13\n21\n34\n55\n89\n144\n233\n377\n610\n987\n1597\n2584\n4181\n6765\n10946\n17711\n28657\n46368\n75025\n",
			'created_at' => '2020-11-01 00:00:08',
			'updated_at' => '2020-11-01 00:00:08',
		], [
			'task_id' => 9,
			'input' => '50',
			'output' => "1\n1\n2\n3\n5\n8\n13\n21\n34\n55\n89\n144\n233\n377\n610\n987\n1597\n2584\n4181\n6765\n10946\n17711\n28657\n46368\n75025\n121393\n196418\n317811\n514229\n832040\n1346269\n2178309\n3524578\n5702887\n9227465\n14930352\n24157817\n39088169\n63245986\n102334155\n165580141\n267914296\n433494437\n701408733\n1134903170\n1836311903\n2971215073\n4807526976\n7778742049\n12586269025\n",
			'created_at' => '2020-11-01 00:00:08',
			'updated_at' => '2020-11-01 00:00:08',
		]]);
    }
}
