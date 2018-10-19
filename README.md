# Greek to Greeklish URL converter
## Usage:

Run the ``script.php`` file and provide the source. This will print the data in the console

```bash
$ php script.php file-to-read.txt
```

If you want to save the data in a file, you can run:

```bash
$ php script.php file-to-read.txt file-to-save.txt
```

the output file will be saved in the same folder.

## Demos: 

To run the demos you can simpy enter:

```bash 
$ php script.php demos/greek-url.txt test.txt
```

this will make all Greek characters from `greek-url.txt` to `test.txt` and will be saved in the root directory of the folder.

Input:
```
https://example.com/αφορά-δημιουργήσει-βιβλίου-Lorem
https://example.com/αναλλοίωτο-τους-όταν-τον
https://example.com/απλά-κάθε-αναλλοίωτο-τυπογραφίας
https://example.com/αναλλοίωτο-ένα-Ipsum-απλά
https://example.com/κείμενο-το-στην-και
```


Output: 

```
https://example.com/afora-dimioyrgisei-vivlioy-Lorem
https://example.com/analloioto-toys-otan-ton
https://example.com/apla-kathe-analloioto-typografias
https://example.com/analloioto-ena-Ipsum-apla
https://example.com/keimeno-to-stin-kai
```
