# benzyne
benzyne is a lightweight data-hiding library written in pure PHP, intended for hiding data on any Windows machine.

# Installation
Simply clone this repository by running the command in your git CLI:

```git clone  https://github.com/FezFamiliar/benzyne``` or download the entire project.

The techniques found in this library only work on  **windows machines**.

# Docker 

You can also build the project with docker via ```docker build -t <your-image-name> .``` and spinning a container with a volume attached with ```docker container run -d -p 80:80  -v <full-path-to-source-folder>:/var/www/html/benzyne <your-image-name>```

If you wish to bash into the container you can use ```winpty docker exec -it <container-hash> bash```. If you're not using git bash just delete the ```winpty```. 

After this accessing ```localhost\benzyne``` should give you a working project.

# Background
All of the techniques presented here are inspired from the book [Data Hiding Techniques In Windows OS, A practical approach to investigation and defense by Nihad Ahmad Hassan and Rami Hijazi](https://www.amazon.com/Data-Hiding-Techniques-Windows-Investigation/dp/0128044497).

The book presents cryptographic, steganographic, forensic/anti-forensic ways to obscure, hide, and make data invisible even for the most computer-savvy people.

This library aims to implement **as many** techniques presented in the book as possible, in [PHP](https://www.php.net/).

# Supported Techniques

* Bit-Shifting
* Concealing data into ```.rtf``` files
* Renaming files
* Concealment via data compression
* File spliting
* Applying the hidden attribute to files

# Documentation
Every function prefixed with an underscore character is what produces the end-result, every other function is just a helper method.

Step 1. Create a new instance of the **SimpleHide** Class

```php
$shift = new SimpleHide();
```

Step 2. Call the desired methods

```
$secret = 'Transfer 10.000 to this account: hdyej2337jemcmy';
$shift->_rich_text($file_path_to_existing_rtf_file, $secret)

$file_name = 'bank_credentials.txt';
$encrypted = $shift->_bit_shift($existing_and_open_file_pointer, $file_name, $secret, false);
// do something with $encrypted
```


# In-Depth

### Bitshifting 

Bitshifting is the act of taking the bytes of a file, reversing all of them and converting the end result into extended ASCII.

The way characters are represented in computers is via **character encodings**, every letter corresponds to a unique byte.

As you know a ```byte``` is made up of 8 bits, where each bit is ether a ```1``` or a ```0```. This means that our values have a range from ```00000000``` to ```11111111```, hence we have 2<sup>8</sup> = 256 possible values. In order to handle all the values, benzyne implements  ASCII as well as extended-ASCII lookup tables.

For example, let's say we have a ```.txt``` file in which you have the following ASCII text: **meet me at 12 o'clock by the riverside**.

By calling the benzyne function ```convert_to_binary``` you can produce the binary representation of the above ASCII:
```
0110110101100101011001010111010000001001011011010110010100001001011000010111010000001001001100010011001000001001011011110010011101100011011011000110111101100011011010110000100101100010011110010000100101110100011010000110010100001001011100100110100101110110011001010111001001110011011010010110010001100101
```

Reversing this would produce the result:
```
1010011000100110100101101100111001001110101001100110111010010110010011101001000010100110000101100010111010010000100111100100011010010000110101101100011011110110001101101100011011100100111101101001000001001100100011001001000000101110100001101001000010100110101101101001000000101110101001101010011010110110
```

The final step is converting this to **UN**readable characters, the above bitstream will output:
```
ª&û╬NªnûNÉª.É×FÉÍã÷6ãõ÷ÉLîÉ.åÉªÂÉ.ªªÂ
```

You can use the ```shift``` method in benzyne to achieve this easily:
```
$encrypted = $instance->shift('meet me at 12 o'clock by the riverside');
```

Because it's a linear encryption, for decryption just call ```shift()``` again.
```
$decrypt = $instance->shift($encrypted);  // should output meet me at 12 o'clock by the riverside
```

**NOTE** This is not a [cryptographically strong encryption](https://en.wikipedia.org/wiki/Strong_cryptography). If you want to use a reliable and strong encryption, use [AES](https://ro.wikipedia.org/wiki/AES).

### Hiding data inside .rtf files

This is a rather straight-forward process, a valid .rtf file starts with the starting tag **{\rtf1** and ends with the ending tag **}**. The idea is that if you append anything after the ending tag, it will become invisible to the user. To see the secret, one must open it with notepad, or a [hex editor](https://mh-nexus.de/en/hxd/).


### Renaming file

File extensions are used by the operating system to determine what program to use in order to open that specific file. This can be tempered with easily to achieve numerous nefarious end-results, in our case, data-hiding.

For example, if you have a ```.docx``` and you rename it to something like ```pid3232.dll``` and place it inside the System32 directory under the C: drive, where alot of operating system files are stored, like **.DLL**, **.EXE**, **.SYS**, also windows by default changes the icon and default associated program used to open the file according to its new extension, chances that this file will be discovered by someone is slim to none.

The only way to know for sure that a file has been renamed is to check the first couple of bytes from the file header a.k.a [**Magic Bytes**](https://blog.netspi.com/magic-bytes-identifying-common-file-formats-at-a-glance/) and compare it to the file signature. Every file extension has their [**File signature**](https://www.filesignatures.net/), for exmaple **.DLL** has the ASCII value **MZ** as their file signature.

Benzyne provides you a helper function called ```match_file_extension_with_signature``` which tells you if a file has been renamed or not.

### File Spliting

Although this is not a task for PHP, there are [**tools**](https://www.gdgsoft.com/gsplit) for this specific task, the idea is to split a file into n-equal parts and hiding one of them. Thus making the rest unreadable

### Hiding .zip files in images

Steganography is a growing sub-field of cryptography which aims to hide information inside images. The function ```_compress``` runs the operating system command on your machine to produce a **bigger** image with its concealed secret ```copy /b img1.png + secret.zip result.png```. This function doesn't take arguments for security reasons.

To reveal your secret, rename the image to **.zip** and open it with winRAR or a hex-editor.

# Implementation

Most of the functions are working with files in binary mode, looking up values in tables, generating random filenames with extensions, matching file signatures with file extensions and encrypting.

# Contributing 

Any contribution must implement a technique from the aformentioned book, improve an existing one or fix potential bugs.

# TODOs

* Porting to C/C++
* Microsoft Office Pack hiding techniques
* Concealment in Audio Files

# Contact

For any recommendations and/or improvements, potential bug fixing please contact me at fezfamiliar@yahoo.com or feel free to submit a pull request.
