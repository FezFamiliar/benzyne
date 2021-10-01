<?php

class SimpleHide implements ISimpleHide
{
    private $exts;

    const SIGNATURES = 
    [
        '*_1' => '41 43 53 44',
        '*_2' => '62 70 6C 69 73 74',
        '*_3' => '00 14 00 00 01 02',
        '*_4' => '30 37 30 37 30',
        '*_5' => '7F 45 4C 46',
        '*_6' => 'A1 B2 CD 34',
        '*_7' => '04 00 00 00',
        '*_8' => '05 00 00 00',
        '*_9' => 'AC ED',
        '*_10' => '4B 57 41 4A 88 F0 27 D1',
        '*_11' => 'CD 20 AA AA 02 00 00 00',
        '*_12' => '53 5A 20 88 F0 27 33 D1',
        '*_13' => '6F 3C',
        '*_14' => '53 5A 44 44 88 F0 27 33',
        '*_15' => 'A1 B2 C3 D4',
        '*_16' => '34 CD B2 A1',
        '*_17' => 'EF BB BF',
        '*_18' => 'FE FF',
        '*_19' => 'FF FE 00 00',
        '*_20' => '62 65 67 69 6E',
        '*_21' => 'D4 C3 B2 A1',
        '*_22' => '37 E4 53 96 C9 DB D6 07',
        '123' => '00 00 1A 00 05 10 04',
        '386' => '4D 5A',
        '3GP' => '00 00 00 20 66 74 79 70',
        '3GP5' => '00 00 00 18 66 74 79 70',
        '4XM' => '52 49 46 46',
        '7Z' => '37 7A BC AF 27 1C',
        'ABA' => '00 01 42 41',
        'ABD' => '51 57 20 56 65 72 2E 20',
        'ABI' => '41 4F 4C',
        'ABY' => '41 4F 4C',
        'AC' => '72 69 66 66',
        'ACCDB' => '00 01 00 00 53 74 61 6E 64 61 72 64 20 41 43 45 20 44 42',
        'ACM' => '4D 5A',
        'ACS' => 'C3 AB CD AB',
        'AC_' => 'D0 CF 11 E0 A1 B1 1A E1',
        'AD' => '52 45 56 4E 55 4D 3A 2C',
        'ADF' => '44 4F 53',
        'ADP' => 'D0 CF 11 E0 A1 B1 1A E1',
        'ADX' => '80 00 00 20 03 12 04',
        'AIFF' => '46 4F 52 4D 00',
        'AIN' => '21 12',
        'AMR' => '23 21 41 4D 52',
        'ANI' => '52 49 46 46',
        'API' => '4D 5A 90 00 03 00 00 00',
        'APR' => 'D0 CF 11 E0 A1 B1 1A E1',
        'ARC' => '1A 09',
        'ARJ' => '60 EA',
        'ARL' => 'D4 2A',
        'ASF' => '30 26 B2 75 8E 66 CF 11',
        'AST' => '53 43 48 6C',
        'ASX' => '3C',
        'AU' => '2E 73 6E 64',
        'AUT' => 'D4 2A',
        'AVI' => '52 49 46 46',
        'AW' => '8A 01 09 00 00 00 E1 08',
        'AX' => '4D 5A',
        'BAG' => '41 4F 4C',
        'BDR' => '58 54',
        'BIN' => '42 4C 49 32 32 33 51',
        'BMP' => '42 4D',
        'BZ2' => '42 5A 68',
        'CAB' => '4D 53 43 46',
        'CAL' => 'B5 A2 B0 B3 B3 B0 A5 B5',
        'CAP' => '52 54 53 53',
        'CAS' => '5F 43 41 53 45 5F',
        'CAT' => '30',
        'CBD' => '43 42 46 49 4C 45',
        'CBK' => '5F 43 41 53 45 5F',
        'CDA' => '52 49 46 46',
        'CDR' => '4D 53 5F 56 4F 49 43 45',
        'CFG' => '5B 66 6C 74 73 69 6D 2E',
        'CHI' => '49 54 53 46',
        'CHM' => '49 54 53 46',
        'CLASS' => 'CA FE BA BE',
        'CLB' => '43 4D 58 31',
        'CMX' => '52 49 46 46',
        'CNV' => '53 51 4C 4F 43 4F 4E 56',
        'COD' => '4E 61 6D 65 3A 20',
        'COM' => 'EB',
        'CPE' => '46 41 58 43 4F 56 45 52',
        'CPI' => 'FF 46 4F 4E 54',
        'CPL' => 'DC DC',
        'CPT' => '43 50 54 46 49 4C 45',
        'CPX' => '5B 57 69 6E 64 6F 77 73',
        'CRU' => '43 52 55 53 48 20 76',
        'CRW' => '49 49 1A 00 00 00 48 45',
        'CSH' => '63 75 73 68 00 00 00 02',
        'CTF' => '43 61 74 61 6C 6F 67 20',
        'CTL' => '56 45 52 53 49 4F 4E 20',
        'CUIX' => '50 4B 03 04',
        'CUR' => '00 00 02 00',
        'DAT' => '72 65 67 66',
        'DB' => 'FD FF FF FF',
        'DB3' => '03',
        'DB4' => '04',
        'DBA' => '00 01 42 44',
        'DBB' => '6C 33 33 6C',
        'DBF' => '4F 50 4C 44 61 74 61 62',
        'DBX' => 'CF AD 12 FE',
        'DCI' => '3C 21 64 6F 63 74 79 70',
        'DCX' => 'B1 68 DE 3A',
        'dex' => '64 65 78 0A 30 30 39 00',
        'DIB' => '42 4D',
        'DLL' => '4D 5A',
        'DMG' => '78',
        'DMP' => '50 41 47 45 44 55',
        'DMS' => '44 4D 53 21',
        'DOC' => 'EC A5 C1 00',
        'DOCX' => '50 4B 03 04 0A 00 00 00',        // Microsoft Word has alot of version thus alot of different magic bytes for every version, this is just one of them.
        'DOT' => 'D0 CF 11 E0 A1 B1 1A E1',
        'DRV' => '4D 5A',
        'DRW' => '01 FF 02 04 03 02',
        'DS4' => '52 49 46 46',
        'DSN' => '4D 56',
        'DSP' => '23 20 4D 69 63 72 6F 73',
        'DSS' => '02 64 73 73',
        'DSW' => '64 73 77 66 69 6C 65',
        'DTD' => '07 64 74 32 64 64 74 64',
        'DUN' => '5B 50 68 6F 6E 65 5D',
        'DVF' => '4D 53 5F 56 4F 49 43 45',
        'DVR' => '44 56 44',
        'DW4' => '4F 7B',
        'DWG' => '41 43 31 30',
        'E01' => '4C 56 46 09 0D 0A FF 00',
        'ECF' => '5B 47 65 6E 65 72 61 6C',
        'EFX' => 'DC FE',
        'EML' => '46 72 6F 6D',
        'ENL' => '40 40 40 20 00 00 40 40 40 40',
        'EPS' => '25 21 50 53 2D 41 64 6F',
        'ETH' => '1A 35 01 00',
        'EVT' => '30 00 00 00 4C 66 4C 65',
        'EVTX' => '45 6C 66 46 69 6C 65 00',
        'EXE' => '4D 5A',
        'FDF' => '25 50 44 46',
        'FLAC' => '66 4C 61 43 00 00 00 22',
        'FLI' => '00 11',
        'FLT' => '76 32 30 30 33 2E 31 30',
        'FLV' => '46 4C 56',
        'FM' => '3C 4D 61 6B 65 72 46 69',
        'FON' => '4D 5A',
        'FTR' => 'D2 0A 00 00',
        'GHO' => 'FE EF',
        'GHS' => 'FE EF',
        'GID' => '4C 4E 02 00',
        'GIF' => '47 49 46 38',
        'GPG' => '99',
        'GRP' => '50 4D 43 43',
        'GX2' => '47 58 32',
        'GZ' => '1F 8B 08',
        'HAP' => '91 33 48 46',
        'HDMP' => '4D 44 4D 50 93 A7',
        'HDR' => '23 3F 52 41 44 49 41 4E',
        'hip' => '48 69 50 21',
        'HLP' => '4C 4E 02 00',
        'HQX' => '28 54 68 69 73 20 66 69',
        'ICO' => '00 00 01 00',
        'IDX' => '50 00 00 00 20 00 00 00',
        'IFO' => '44 56 44',
        'IMG' => '53 43 4D 49',
        'IND' => '41 4F 4C',
        'INFO' => '7A 62 65 78',
        'ISO' => '43 44 30 30 31',
        'IVR' => '2E 52 45 43',
        'JAR' => '50 4B 03 04 14 00 08 00',
        'JFIF' => 'FF D8 FF E0',
        'JG' => '4A 47 04 0E',
        'JNT' => '4E 42 2A 00',
        'JP2' => '00 00 00 0C 6A 50 20 20',
        'JPE' => 'FF D8 FF E0',
        'JPEG' => 'FF D8 FF E3',
        'JPG' => 'FF D8 FF E8',
        'JTP' => '4E 42 2A 00',
        'KGB' => '4B 47 42 5F 61 72 63 68',
        'KOZ' => '49 44 33 03 00 00 00',
        'KWD' => '50 4B 03 04',
        'LBK' => 'C8 00 79 00',
        'LGC' => '7B 0D 0A 6F 20',
        'LGD' => '7B 0D 0A 6F 20',
        'LHA' => '2D 6C 68',
        'LIB' => '21 3C 61 72 63 68 3E 0A',
        'LIT' => '49 54 4F 4C 49 54 4C 53',
        'LNK' => '4C 00 00 00 01 14 02 00',
        'LOG' => '2A 2A 2A 20 20 49 6E 73',
        'LWP' => '57 6F 72 64 50 72 6F',
        'LZH' => '2D 6C 68',
        'M4A' => '00 00 00 20 66 74 79 70 4D 34 41',
        'MANIFEST' => '3C 3F 78 6D 6C 20 76 65 72 73 69 6F 6E 3D',
        'MAR' => '4D 41 52 31 00',
        'MDB' => '00 01 00 00 53 74 61 6E 64 61 72 64 20 4A 65 74 20 44 42',
        'MDF' => '01 0F 00 00',
        'MDI' => '45 50',
        'MID' => '4D 54 68 64',
        'MIDI' => '4D 54 68 64',
        'MIF' => '56 65 72 73 69 6F 6E 20',
        'MKV' => '1A 45 DF A3 93 42 82 88',
        'MLS' => '4D 4C 53 57',
        'MMF' => '4D 4D 4D 44 00 00',
        'MNY' => '00 01 00 00 4D 53 49 53 41 4D 20 44 61 74 61 62 61 73 65',
        'MOF' => 'FF FE 23 00 6C 00 69 00',
        'MOV' => '73 6B 69 70',
        'MP' => '0C ED',
        'MP3' => '49 44 33',
        'MPG' => '00 00 01 B3',
        'MSC' => '3C 3F 78 6D 6C 20 76 65 72 73 69 6F 6E 3D 22 31 2E 30 22 3F 3E 0D 0A 3C 4D 4D 43 5F 43 6F 6E 73 6F 6C 65 46 69 6C 65 20 43 6F 6E 73 6F 6C 65 56 65 72',
        'MSI' => '23 20',
        'MSV' => '4D 53 5F 56 4F 49 43 45',
        'MTW' => 'D0 CF 11 E0 A1 B1 1A E1',
        'NRI' => '0E 4E 65 72 6F 49 53 4F',
        'NSF' => '4E 45 53 4D 1A 01',
        'NTF' => '30 31 4F 52 44 4E 41 4E',
        'NVRAM' => '4D 52 56 4E',
        'OBJ' => '80',
        'OCX' => '4D 5A',
        'ODP' => '50 4B 03 04',
        'ODT' => '50 4B 03 04',
        'OGA' => '4F 67 67 53 00 02 00 00',
        'OGG' => '4F 67 67 53 00 02 00 00',
        'OGV' => '4F 67 67 53 00 02 00 00',
        'OGX' => '4F 67 67 53 00 02 00 00',
        'OLB' => '4D 5A',
        'ONE' => 'E4 52 5C 7B 8C D8 A7 4D',
        'OPT' => 'FD FF FF FF 20',
        'ORG' => '41 4F 4C 56 4D 31 30 30',
        'OTT' => '50 4B 03 04',
        'P10' => '64 00 00 00',
        'PAK' => '50 41 43 4B',
        'PAT' => '47 50 41 54',
        'PAX' => '50 41 58',
        'PCH' => '56 43 50 43 48 30',
        'PCX' => '0A 02 01 01',
        'PDB' => '73 6D 5F',
        'PDF' => '25 50 44 46',
        'PF' => '11 00 00 00 53 43 43 41',
        'PFC' => '41 4F 4C 56 4D 31 30 30',
        'PGD' => '50 47 50 64 4D 41 49 4E',
        'PGM' => '50 35 0A',
        'PIF' => '4D 5A',
        'PKR' => '99 01',
        'PNG' => '89 50 4E 47 0D 0A 1A 0A',
        'PPS' => 'D0 CF 11 E0 A1 B1 1A E1',
        'PPT' => '00 6E 1E F0',
        'PPTX' => '50 4B 03 04 14 00 06 00',
        'PPZ' => '4D 53 43 46',
        'PRC' => '42 4F 4F 4B 4D 4F 42 49',
        'PSD' => '38 42 50 53',
        'PSP' => '7E 42 4B 00',
        'PUB' => 'D0 CF 11 E0 A1 B1 1A E1',
        'PWI' => '7B 5C 70 77 69',
        'PWL' => 'B0 4D 46 43',
        'QBB' => '45 86 00 00 06 00',
        'QCP' => '52 49 46 46',
        'QDF' => 'AC 9E BD 8F 00 00',
        'QEL' => '51 45 4C 20',
        'QEMU' => '51 46 49',
        'QPH' => '03 00 00 00',
        'QSD' => '51 57 20 56 65 72 2E 20',
        'QTS' => '4D 5A',
        'QTX' => '4D 5A',
        'QXD' => '00 00 49 49 58 50 52',
        'RA' => '2E 52 4D 46 00 00 00 12',
        'RAM' => '72 74 73 70 3A 2F 2F',
        'RAR' => '52 61 72 21 1A 07 00',
        'REG' => 'FF FE',
        'RGB' => '01 DA 01 01 00 03',
        'RM' => '2E 52 4D 46',
        'RMI' => '52 49 46 46',
        'RMVB' => '2E 52 4D 46',
        'RPM' => 'ED AB EE DB',
        'RTD' => '43 23 2B 44 A4 43 4D A5',
        'RTF' => '7B 5C 72 74 66 31',
        'RVT' => 'D0 CF 11 E0 A1 B1 1A E1',
        'SAM' => '5B 56 45 52 5D',
        'SAV' => '24 46 4C 32 40 28 23 29',
        'SCR' => '4D 5A',
        'SDR' => '53 4D 41 52 54 44 52 57',
        'SH3' => '48 48 47 42 31',
        'SHD' => '68 49 00 00',
        'SHW' => '53 48 4F 57',
        'SIT' => '53 49 54 21 00',
        'SKF' => '07 53 4B 46',
        'SKR' => '95 00',
        'SLE' => '41 43 76',
        'SLN' => '4D 69 63 72 6F 73 6F 66 74 20 56 69 73 75 61 6C',
        'SNM' => '00 1E 84 90 00 00 00 00',
        'SNP' => '4D 53 43 46',
        'SOU' => 'D0 CF 11 E0 A1 B1 1A E1',
        'SPL' => '00 00 01 00',
        'SPO' => 'D0 CF 11 E0 A1 B1 1A E1',
        'SUD' => '52 45 47 45 44 49 54',
        'SUO' => 'FD FF FF FF 04',
        'SWF' => '43 57 53',
        'SXC' => '50 4B 03 04',
        'SXD' => '50 4B 03 04',
        'SXI' => '50 4B 03 04',
        'SXW' => '50 4B 03 04',
        'SYS' => 'FF FF FF FF',
        'SYW' => '41 4D 59 4F',
        'TAR' => '75 73 74 61 72',
        'TAR.BZ2' => '42 5A 68',
        'TAR.Z' => '1F 9D 90',
        'TB2' => '42 5A 68',
        'TBZ2' => '42 5A 68',
        'TIB' => 'B4 6E 68 44',
        'TIF' => '4D 4D 00 2B',
        'TIFF' => '4D 4D 00 2A',
        'TLB' => '4D 53 46 54 02 00 01 00',
        'TR1' => '01 10',
        'UCE' => '55 43 45 58',
        'UFA' => '55 46 41 C6 D2 C1',
        'VBX' => '4D 5A',
        'VCD' => '45 4E 54 52 59 56 43 44',
        'VCF' => '42 45 47 49 4E 3A 56 43',
        'VCW' => '5B 4D 53 56 43',
        'VHD' => '63 6F 6E 65 63 74 69 78',
        'VMDK' => '43 4F 57 44',
        'VOB' => '00 00 01 BA',
        'VSD' => 'D0 CF 11 E0 A1 B1 1A E1',
        'VXD' => '4D 5A',
        'WAB' => '9C CB CB 8D 13 75 D2 11',
        'WAV' => '52 49 46 46',
        'WB2' => '00 00 02 00',
        'WB3' => '3E 00 03 00 FE FF 09 00 06',
        'WIZ' => 'D0 CF 11 E0 A1 B1 1A E1',
        'WK1' => '00 00 02 00 06 04 06 00',
        'WK3' => '00 00 1A 00 00 10 04 00',
        'WK4' => '00 00 1A 00 02 10 04 00',
        'WK5' => '00 00 1A 00 02 10 04 00',
        'WKS' => 'FF 00 02 00 04 04 05 54',
        'WMA' => '30 26 B2 75 8E 66 CF 11',
        'WMF' => 'D7 CD C6 9A',
        'WMV' => '30 26 B2 75 8E 66 CF 11',
        'WMZ' => '50 4B 03 04',
        'WP' => 'FF 57 50 43',
        'WP5' => 'FF 57 50 43',
        'WP6' => 'FF 57 50 43',
        'WPD' => 'FF 57 50 43',
        'WPF' => '81 CD AB',
        'WPG' => 'FF 57 50 43',
        'WPL' => '4D 69 63 72 6F 73 6F 66 74 20 57 69 6E 64 6F 77 73 20 4D 65 64 69 61 20 50 6C 61 79 65 72 20 2D 2D 20',
        'WPP' => 'FF 57 50 43',
        'WPS' => 'D0 CF 11 E0 A1 B1 1A E1',
        'WRI' => '31 BE',
        'WS' => '1D 7D',
        'WS2' => '57 53 32 30 30 30',
        'XDR' => '3C',
        'XLA' => 'D0 CF 11 E0 A1 B1 1A E1',
        'XLS' => 'D0 CF 11 E0 A1',  // might not match
        'XLSX' => '50 4B 03 04 14 00 06 00',
        'XML' => '3C 3F 78 6D 6C 20 76 65 72 73 69 6F 6E 3D 22 31 2E 30 22 3F 3E',
        'XPI' => '50 4B 03 04',
        'XPS' => '50 4B 03 04',
        'XPT' => '58 50 43 4F 4D 0A 54 79',
        'ZAP' => '4D 5A 90 00 03 00 00 00 04 00 00 00 FF FF',
        'ZIP' => '57 69 6E 5A 69 70',
        'ZOO' => '5A 4F 4F 20'
    ];
    
    const ASCII_TABLE = 
    [
        '00000000' => '',  // NULL 
        '00000001' => '', // SOH  (start of heading) 
        '00000010' => '', // STX  (start of text) 
        '00000011' => '', // ETX  (end of text)
        '00000100' => '', // EOT  (end of transmission)
        '00000101' => '', // ENQ  (enquiry)
        '00000110' => '', // ACK  (acknowledge)
        '00000111' => '', // BEL  (bell)
        '00001000' => '', // BS   (backspace)
        '00001001' => ' ', // TAB   (horizontal tab)
        '00001010' => ' ', // NL    (line feed, new line) 
        '00001011' => '', // VT   (vertical tab)
        '00001100' => '',  // NP    (new page)
        '00001101' => ' ', // CR    (carriage return) 
        '00001110' => '', // SO   (shift out)
        '00001111' => '', // SI   (shift in)
        '00010000' => '', // DLE  (delta link escape)
        '00010001' => '', // DC1  (device control 1)
        '00010010' => '', // DC2  (device control 2)
        '00010011' => '', // DC3  (device control 3)
        '00010100' => '', // DC4  (device control 4)
        '00010101' => '', // NAK  (negative acknowledge)
        '00010110' => '', // SYN  (synchronous idle)
        '00010111' => '', // ETB  (end of trans. block)
        '00011000' => '', // CAN  (cancel)
        '00011001' => '', // EN   (end of medium)
        '00011010' => '', // SUB  (substitute)
        '00011011' => '', // ESC  (escape)
        '00011100' => '', // FS   (file separator) 
        '00011101' => '', // GS   (group separator)
        '00011110' => '', // RS   (record separator)
        '00011111' => '', // US   (unit separator)
        '00100000' => ' ',
        '00100001' => '!',
        '00100010' => '"',
        '00100011' => '#',
        '00100100' => '$',
        '00100101' => '%',
        '00100110' => '&',
        '00100111' => '\'',
        '00101000' => '(',
        '00101001' => ')',
        '00101010' => '*',
        '00101011' => '+',
        '00101100' => ',',
        '00101101' => '-',
        '00101110' => '.',
        '00101111' => '/',
        '00110000' => '0',
        '00110001' => '1',
        '00110010' => '2',
        '00110011' => '3',
        '00110100' => '4',
        '00110101' => '5',
        '00110110' => '6',
        '00110111' => '7',
        '00111000' => '8',
        '00111001' => '9',
        '00111010' => ':',
        '00111011' => ';',
        '00111100' => '<',
        '00111101' => '=',
        '00111110' => '>',
        '00111111' => '?',
        '01000000' => '@',
        '01000001' => 'A',
        '01000010' => 'B',
        '01000011' => 'C',
        '01000100' => 'D',
        '01000101' => 'E',
        '01000110' => 'F',
        '01000111' => 'G',
        '01001000' => 'H',
        '01001001' => 'I',
        '01001010' => 'J',
        '01001011' => 'K',
        '01001100' => 'L',
        '01001101' => 'M',
        '01001110' => 'N',
        '01001111' => 'O',
        '01010000' => 'P',
        '01010001' => 'Q',
        '01010010' => 'R',
        '01010011' => 'S',
        '01010100' => 'T',
        '01010101' => 'U',
        '01010110' => 'V',
        '01010111' => 'W',
        '01011000' => 'X',
        '01011001' => 'Y',
        '01011010' => 'Z',
        '01011011' => '[',
        '01011100' => '\\',
        '01011101' => ']',
        '01011110' => '^',
        '01011111' => '_',
        '01100000' => '`',
        '01100001' => 'a',
        '01100010' => 'b',
        '01100011' => 'c',
        '01100100' => 'd',
        '01100101' => 'e',
        '01100110' => 'f',
        '01100111' => 'g',
        '01101000' => 'h',
        '01101001' => 'i',
        '01101010' => 'j',
        '01101011' => 'k',
        '01101100' => 'l',
        '01101101' => 'm',
        '01101110' => 'n',
        '01101111' => 'o',
        '01110000' => 'p',
        '01110001' => 'q',
        '01110010' => 'r',
        '01110011' => 's',
        '01110100' => 't',
        '01110101' => 'u',
        '01110110' => 'v',
        '01110111' => 'w',
        '01111000' => 'x',
        '01111001' => 'y',
        '01111010' => 'z',
        '01111011' => '{',
        '01111100' => '|',
        '01111101' => '}',
        '01111110' => '~',
        '01111111' => '',
        '10000000' => 'Ç',
        '10000001' => 'ü',
        '10000010' => 'é',
        '10000011' => 'â',
        '10000100' => 'ä',
        '10000101' => 'à',
        '10000110' => 'å',
        '10000111' => 'ç',
        '10001000' => 'ê',
        '10001001' => 'ë',
        '10001010' => 'è',
        '10001011' => 'ï',
        '10001100' => 'î',
        '10001101' => 'ì',
        '10001110' => 'Ä',
        '10001111' => 'Å',
        '10010000' => 'É',
        '10010001' => 'æ',
        '10010010' => 'Æ',
        '10010011' => 'ô',
        '10010100' => 'ö',
        '10010101' => 'ò',
        '10010110' => 'û',
        '10010111' => 'ù',
        '10011000' => 'ÿ',
        '10011001' => 'Ö',
        '10011010' => 'Ü',
        '10011011' => 'ø',
        '10011100' => '£',
        '10011101' => 'Ø',
        '10011110' => '×',
        '10011111' => 'ƒ',
        '10100000' => 'á',
        '10100001' => 'í',
        '10100010' => 'ó',
        '10100011' => 'ú',
        '10100100' => 'ñ',
        '10100101' => 'Ñ',
        '10100110' => 'ª',
        '10100111' => 'º',
        '10101000' => '¿',
        '10101001' => '®',
        '10101010' => '¬',
        '10101011' => '½',
        '10101100' => '¼',
        '10101101' => '¡',
        '10101110' => '«',
        '10101111' => '»',
        '10110000' => '░',
        '10110001' => '▒',
        '10110010' => '▓',
        '10110011' => '│',
        '10110100' => '┤',
        '10110101' => 'Á',
        '10110110' => 'Â',
        '10110111' => 'À',
        '10111000' => '©',
        '10111001' => '╣',
        '10111010' => '║',
        '10111011' => '╗',
        '10111100' => '╝',
        '10111101' => '¢',
        '10111110' => '¥',
        '10111111' => '┐',
        '11000000' => '└',
        '11000001' => '┴',
        '11000010' => '┬',
        '11000011' => '├',
        '11000100' => '─',
        '11000101' => '┼',
        '11000110' => 'ã',
        '11000111' => 'Ã',
        '11001000' => '╚',
        '11001001' => '╔',
        '11001010' => '╩',
        '11001011' => '╦',
        '11001100' => '╠',
        '11001101' => '═',
        '11001110' => '╬',
        '11001111' => '¤',
        '11010000' => 'ð',
        '11010001' => 'Ð',
        '11010010' => 'Ê',
        '11010011' => 'Ë',
        '11010100' => 'È',
        '11010101' => 'ı',
        '11010110' => 'Í',
        '11010111' => 'Î',
        '11011000' => 'Ï',
        '11011001' => '┘',
        '11011010' => '┌',
        '11011011' => '█',
        '11011100' => '▄',
        '11011101' => '¦',
        '11011110' => 'Ì',
        '11011111' => '▀',
        '11100000' => 'Ó',
        '11100001' => 'ß',
        '11100010' => 'Ô',
        '11100011' => 'Ò',
        '11100100' => 'õ',
        '11100101' => 'Õ',
        '11100110' => 'µ',
        '11100111' => 'þ',
        '11101000' => 'Þ',
        '11101001' => 'Ú',
        '11101010' => 'Û',
        '11101011' => 'Ù',
        '11101100' => 'ý',
        '11101101' => 'Ý',
        '11101110' => '¯',
        '11101111' => '´',
        '11110000' => '≡',
        '11110001' => '±',
        '11110010' => '‗',
        '11110011' => '¾',
        '11110100' => '¶',
        '11110101' => '§',
        '11110110' => '÷',
        '11110111' => '¸',
        '11111000' => '°',
        '11111001' => '¨',
        '11111010' => '·',
        '11111011' => '¹',
        '11111100' => '³',
        '11111101' => '²',
        '11111110' => '■',
        '11111111' => 'nbsp'
    ];

    public function __construct()
    {
        $this->exts = ['.dll', '.exe', '.sys', '.nt', '.drv', '.cab', '.swp', '.log'];
    }

    /*  
        This function takes an already existing file, appends a secret, reverses the bits and by default closes the file handler,
        if you want to return it, specify $close = false.
    */
    public function _bit_shift(&$file_p, $file_name, $secret, $close = true)
    {
        try
        {
            if(!is_resource($file_p))
            {
                throw new Exception('File stream must be open!');
            }
        
            fwrite($file_p, $secret);
            
            $contents = file_get_contents($file_name);
            $hide = $this->shift($contents);   
            file_put_contents($file_name, $hide); // overwrite with encrypted data

            if($close)
            {
                fclose($file_p);
            }
            else
            {
                return $file_p;
            }
        }
        catch(Exception $e)
        {   
            echo $e->getMessage() . "\n";
        }
    }

    /*
        This function hides data inside an already existing .rtf file.
        The contents will be seen only when inspected with notepad which is highly unlikely.
    */
    public function _rich_text(&$file_p, $secret, $close = true)
    {
        try
        {
            if(!is_resource($file_p))
            {
                throw new Exception('File stream must be open!');
            }

            fwrite($file_p, $secret);   // will append secret after the closing .rtf tag thus hiding it.

            if($close)
            {
                fclose($file_p);
            }
            else
            {
                return $file_p;
            }
        }
        catch(\Exception $e)
        {
            echo $e->getMessage() . "\n";
        }
    }

    /*
        Renaming files is a classic act of stealth, you can rename any file to any extension. In windows, every file type has a unique signature,
        stored in the first 20 bytes of the header. 
        The only way to track it down is to check this signature and compare it to the extension. For example, if you opened a .dll file and its
        signature is anything other than (MZ), you know that it was renamed.
        Furthermore you can place these files in a place where you are almost certain that nobody hardly ever looks, like in C:/Windows/System32.
    */
    public function _rename($file_path, $new_name = '')
    {
        try
        {
            rename($file_path, ($new_name == '') ? $this->generate_random_filename() : $new_name);
        }
        catch(\Exception $e)
        {
            echo $e->getMessage() . "\n";
        }
    }

    /*
        $files - an array of files, use glob("*.*") to retrieve EVERY file in the current directory.
        This function hides them.
    */

    public function _hide_all($files)
    {
        $n = count($files);
        for($i = 0; $i < $n; ++$i)
        {
            system('attrib +H ' . escapeshellarg($files[$i]));
        }
    }
    
    /*
        This function runs the command 'copy /b img1.png + secret.zip landscape1.png' on your windows OS. It hides a .zip folder inside an image.
        NOTE: Image size will grow so try and keep your secret as lightweight as possible in order to avoid suspicion.
        This function doesn't have arguments for security reasons. Modify at your own risk.
    */
    public function _compress()
    {   
        system('copy /b img1.png + secret.zip landscape1.png');
    }

    /*
    This function splits the file into n parts. It will output n + 1 parts for some reason, if you know why please send a pull request.
    */
    public function _file_split($filename, $parts, $debug = false)
    {
        $size = filesize($filename);
        $single_part = $size / $parts;
        $ext = strstr($filename, '.');
        if($debug)
        {
            echo 'Filesize: ' . $size . "<br>";
            echo $size . ' / ' . $parts . ' = ' . $single_part . "<br>";
        }
        
        $full_content = file_get_contents($filename, $size);
        $whole = str_split($full_content, $single_part);
        $i = 1;

        foreach($whole as $fragment)
        {
            $partial = fopen('fragment_' . $i++ . $ext, 'w');
            fwrite($partial, $fragment);    
            fclose($partial);
        }
    }

    /* 
        Converting from EXTENDED ASCII to binary and vice-versa.
    */
    public function convert_to_binary($text, $debug = false)
    {
        $chars = [];

        preg_match_all('/./u', $text, $chars);
        $result = [];
        $result_value = "";

        if($debug)
        {   
            echo '<pre>';
            print_r($chars[0]);
            echo '</pre>';
        }

        foreach($chars[0] as $char)
        {
            $result[] = array_search($char, self::ASCII_TABLE);
        }

        if($debug)
        {
            echo '<pre>';
            print_r($result);
            echo '</pre>';

            for($i = 0; $i < count($result); ++$i)
            {
                echo $result[$i] . ' ';
            }
        }

        return implode('', $result); 
    }

    public function convert_from_binary($binary, $debug = false)
    {
        $bin = str_split($binary, 8);
        $n = count($bin);
        $result = "";

        if($debug)
        {
            echo '<pre>';
            print_r($bin);
            echo '</pre>';
        }

        for($i = 0; $i < $n; ++$i)
        {   
            $result .= self::ASCII_TABLE[$bin[$i]];
        }

        if($debug)
        {
            echo $result . "<br>";
        }

        return $result;
    }

    public function convert_to_int($text)
    {
        return base_convert(unpack('H*', $text)[1], 16, 10);
    }

    public function convert_from_int($int)
    {
        return pack('H*', base_convert($int, 10, 16));
    }

    public function remove_non_printables($string)
    {
        return preg_replace('/[[:^print:]]/', '?', $string);
    }

    /*
        This function returns the first 8 bytes of any file. These bytes are also knows as "Magic Bytes".
    */
    public function getMagicBytes($filename, $size = 8)
    {
        return rtrim(chunk_split(strtoupper(substr(bin2hex(file_get_contents($filename)), 0, $size * 2)), 2, ' '));
    }

    /*
        This function returns true if the extension's signature matches the magic bytes found in its header file. False otherwise.
    */
    public function match_file_extension_with_signature($filename, $debug = false)
    {
        $ext = strstr($filename, '.');          // find first occurence of dot, return the part after
        $ext = str_replace('.', '', $ext);
        $ext = strtoupper($ext);
        $bytes = self::SIGNATURES[$ext]; // look it up
        $bytes_length = str_replace(' ', '', $bytes);
        $bytes_length = strlen($bytes_length);
        $bytes_length /= 2;

        if($debug)
        {
            echo 'File name: ' . $filename . "<br>";
            echo 'File extension: ' . $ext . "<br>";
            echo 'Signature bytes for ' . $ext . ' in lookup table: ' . $bytes . "<br>";
            echo 'Actual bytes extracted from file header: ' . $this->getMagicBytes($filename, $bytes_length) . "<br>";
        }
        if($bytes != '')
        {
            // get file's REAL bytes with the appropiate length
            $real_bytes = $this->getMagicBytes($filename, $bytes_length);
            
            return ($bytes == $real_bytes) ? true : false;
        }

        return;
    }

    /*
        This function generates an innocuos looking file that is really unlikely to arose any suspicion.
        Common operating system file extensions are then appended to this file to further prevent anybody from looking.
        These files are very unlikely to be opened by even the most computer savvy individual.
    */
    public function generate_random_filename()
    {
        $n = count($this->exts);
        $files = 
        [
            'MSDOS386',
            'MSDOS387',
            'MSDOS388',
            'MSDOS389',
            'MSDOS390',
            'MSDOS391',
            'MSDOS392',
            'MSDOS393',
            'MSDOS394',
            'MSDOS395',
            'aflinx',
            'afdd',
            'cadriv',
            'amd0201',
            'appid0001',
            'bcyi',
            'pant',
            'cfe64',
            'bus64x',
            'PiaL_b',
            'ttpit',
            'micsrs',
            'dusi',
            'admir',
            'dosctf',
            'pid0901',
            'qwarmicr',
            'libter',
            'pid394',
            'pid321',
            'pid344',
            'qpider',
            'amidst3',
            'linkyx',
            'derl'
        ];

        $m = count($files);

        return $files[rand(0, $m - 1)] . $this->exts[rand(0, $n - 1)];
    }

    /*
        A wrapper for the shift encryption. For decryption, just call this function again.
    */
    public function shift($text, $debug = false)
    {
        if($debug)
        {
            echo $text . " <==== string to shift <br>";
            echo $this->convert_to_binary($text) . " <==== its binary form <br>";
            echo strrev($this->convert_to_binary($text)) . " <==== its reversed form <br>";
            echo $this->convert_from_binary(strrev($this->convert_to_binary($text))) . " <=== result <br>";
            echo $this->convert_to_binary($this->convert_from_binary(strrev($this->convert_to_binary($text)))) . " <==== binary of result<br>";
            echo $this->convert_from_binary(strrev($this->convert_to_binary($this->convert_from_binary(strrev($this->convert_to_binary($text)))))) . " <==== ascii of result<br>";
        }

        return $this->convert_from_binary(strrev($this->convert_to_binary($text)));
    }
}
