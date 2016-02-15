<?php
/*
 * ExportCatalogue
 * Copyright(c) 2015 IDS Co., Ltd. All Rights Reserved.
 * http://www.ids.co.jp
 */
require_once CLASS_REALDIR . 'helper/SC_Helper_FPDI.php';

class plg_ExportCatalogue_Helper_FPDI extends SC_Helper_FPDI
{
    const CELL_HEIGHT = 5;
    const MIN_ROW_HEIGHT = 13;

    /**
     * Create pdf file
     * @param $header
     * @param $headerTitles
     * @param $data
     * @param $w
     */
    public function createPdf($header, $headerTitles, $data, $w)
    {
        $this->SetMargins(20, 20);
        $this->AliasNbPages();
        $this->AddPage();
        $this->AddSJISFont();
        $this->SetFont('SJIS');
        $this->setTopHeader($header);
        $this->FancyTable($headerTitles, $data, $w);
    }

    /**
     * Draw fancy table
     * @param $header
     * @param $data
     * @param $w
     */
    public function FancyTable($header, $data, $w)
    {
        $this->y += 7;
        $base_x = $this->x;
        // Data
        $fill = false;
        foreach ($data as $pos => $row) {
            // Check for add to next page or not
            $isNewPage = $this->checkAddNewPage($header, $w, $row);
            //Check if this is first page and  the first data will show in first page.
            // Draw header
            if ($isNewPage === false && $pos === 0) {
                $this->addTableHeader($header, $w);
            }

            $x = $base_x;
            $h = self::CELL_HEIGHT;
            $i = 0;
            // XXX この処理を消すと2ページ目以降でセルごとに改ページされる。
            $this->Cell(0, $h, '', 0, 0, '', 0, '');

            $maxHeight = $h;
            foreach ($row as $key => $col) {
                // 列位置
                $this->x = $x;
                $y_before = $this->y;
                $currentX = $this->x + $w[$key];
                switch ($key) {
                    case 0:
                        $this->y += 1;
                        $this->x += 1;
                        if (empty($col)) {
                            $this->SJISMultiCell($w[0], $h, "", "", "L", false, 0);
                        } else {
                            $this->SJISMultiCell($w[0], $h, $this->Image(IMAGE_SAVE_REALDIR . $col, $this->x, $this->y, 11), "", "L", false, 0);
                        }
                        $maxHeight = self::MIN_ROW_HEIGHT;
                        break;
                    case 1:
                        $this->SetFont("SJIS", "U");
                        $this->SJISMultiCell($w[1], $h, $col, "", "J", false, 0);
                        $this->Link($this->x + $w[0], $y_before, $w[$i], $this->y - $y_before, HTTP_URL . 'products/detail.php?product_id=' . $row[5]);
                        $this->SetFont("SJIS");
                        break;
                    case 2:
                        if (is_array($col)) {
                            $currentY = $this->y;
                            foreach ($col as $index => $value) {
                                $yChanged = 0;
                                $this->SJISMultiCell($w[$i], $h, $value, "", "L", false, 0);
                                $yChanged = $this->y - $currentY > $yChanged ? $this->y - $currentY : $yChanged;
                                $this->y = $currentY;
                                $this->x = $currentX;
                                $this->SJISMultiCell($w[$i + 1], $h, $row[3][$index], "", "L", false, 0);
                                $yChanged = $this->y - $currentY > $yChanged ? $this->y - $currentY : $yChanged;
                                $this->y = $currentY;
                                $this->x = $currentX + $w[3];
                                $this->SJISMultiCell($w[$i + 2], $h, $row[4][$index], "", "L", false, 0);
                                $this->x = $currentX - $w[2];
                                $yChanged = $this->y - $currentY > $yChanged ? $this->y - $currentY : $yChanged;
                                $this->y = $currentY += $yChanged;
                            }
                        }
                        break;
                    default:
                        break;
                }

                $currentHeight = $this->y - $y_before;
                $this->y = $y_before;
                $x += $w[$i];
                $i++;
                $maxHeight = $currentHeight > $maxHeight ? $currentHeight : $maxHeight;
            }
            $this->x = $base_x;
            $this->SJISMultiCell(array_sum($w), $maxHeight, '', "LRB", "L", false, 0);
            $this->y -= $maxHeight;

            $this->Ln();
            $fill = !$fill;

        }
        $this->SetFillColor(255);
        $this->x = $base_x;
    }

    /**
     * Draw footer
     */
    public function Footer()
    {
        $base_y = $this->y;
        // Colors, line width and bold font
        $this->SetFillColor(216, 216, 216);
        $this->SetTextColor(0);
        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(.3);
        $this->SetFont('', '');
        $this->y = 280;
        $this->Cell(180, 10, $this->PageNo() . ' / {nb} ページ', '', 0, 'C', 0);
        $this->y = $base_y;

        // Color and font restoration
        $this->SetFillColor(235, 235, 235);
        $this->SetTextColor(0);
        $this->SetFont('');
    }

    /**
     * Checking to create new page or not
     * @param $header
     * @param $w
     * @param $data
     * @return boolean
     */
    private function checkAddNewPage($header, $w, $data)
    {
        // Calculating height of new row
        $h = self::CELL_HEIGHT;
        $yBefore = $this->y;
        $heightOfFirstCol = $this->calculateHeightOfMultiCell($w[1], $h, $data[1], "", "J", false, 0);

        $heightOfOtherCol = 0;
        $this->y = $yBefore;
        if (is_array($data[2])) {
            foreach ($data[2] as $index => $value) {
                $yChanged = 0;
                $yChangedTemp = $this->calculateHeightOfMultiCell($w[2], $h, $data[2][$index], "", "L", false, 0);
                $yChanged = $yChangedTemp > $yChanged ? $yChangedTemp : $yChanged;
                $this->y = $yBefore;
                $yChangedTemp = $this->calculateHeightOfMultiCell($w[3], $h, $data[3][$index], "", "L", false, 0);
                $yChanged = $yChangedTemp > $yChanged ? $yChangedTemp : $yChanged;
                $this->y = $yBefore;
                $yChangedTemp = $this->calculateHeightOfMultiCell($w[4], $h, $data[4][$index], "", "L", false, 0);
                $yChanged = $yChangedTemp > $yChanged ? $yChangedTemp : $yChanged;
                $heightOfOtherCol += $yChanged;
            }
        }
        $height = $heightOfFirstCol > $heightOfOtherCol ? $heightOfFirstCol : $heightOfOtherCol;
        $this->y = $yBefore;
        if ($height < self::MIN_ROW_HEIGHT) {
            $height = self::MIN_ROW_HEIGHT;
        }
        $isNextPage = $this->y + $height > $this->h - $this->bMargin;

        // Checking to create new page or not
        if ($isNextPage) {
            $this->addPage();
            // Header
            $this->addTableHeader($header, $w);
        }
        return $isNextPage;
    }

    /**
     * Draw Top Header
     * @param $data
     */
    private function setTopHeader($data)
    {
        $base_x = $this->x;
        // Colors, line width and bold font
        $this->SetFillColor(216, 216, 216);
        $this->SetTextColor(0);
        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(.3);
        // get size of logo after resize
        list($logoWidth, $logoHeight) = $this->getSizeLogoResize($data['logo']['width'], $data['logo']['height']);
        $this->Image($data['logo']['link'], $this->x + 3, $this->y, $logoWidth, $logoHeight);
        $this->y = 40;
        $this->SetFont('', 'BU', 18);
        $this->SJISMultiCell(170, 10, $data['shopName'], "", "C", false, 0);
        $this->SetFont('', 'B', 9);
        $this->y += 5;
        $this->x = $base_x;
        $this->Cell(32, 4, '＜対象一覧＞', '', 0, 'L');
        $this->Ln();
        $this->Cell(18, 4, 'カテゴリ ：', '', 0, 'L');
        $this->SetFont('', '', 9);
        $headerCatalog = $data['catalog'] === NULL ? '指定なし' : $data['catalog'];
        $this->SJISMultiCell(152, 4, $headerCatalog, "", "L", false, 0);
        $this->SetFont('', 'B', 9);
        $this->Cell(18, 4, 'メーカー ：', '', 0, 'L');
        $this->SetFont('', '', 9);
        $headerMaker = $data['maker'] === NULL ? '指定なし' : $data['maker'];
        $this->SJISMultiCell(152, 4, $headerMaker, "", "L", false, 0);
        $this->SetFont('', 'B', 9);
        $this->Cell(29, 4, '検索キーワード ：', '', 0, 'L');
        $this->SetFont('', '', 9);
        $headerKey = $data['key'] === "" ? '指定なし' : $data['key'];
        $this->SJISMultiCell(142, 4, $headerKey, "", "L", false, 0);
        $this->SetFont('', 'B', 9);
        $this->Cell(25, 4, '表示商品件数 :', '', 0, 'L');
        $this->SetFont('', '', 9);
        $this->Cell(100, 4, $data['number'] . '件', '', 0, 'L');
        $this->x = $base_x;
    }

    /**
     * get size Logo after resize with max width and max height
     * @param $imgWidth
     * @param $imgHeight
     * @return array
     */
    private function getSizeLogoResize($imgWidth, $imgHeight)
    {
        // convert from pixel to millimeters
        $logoWMm = $imgWidth / 3.779528;
        $logoHMm = $imgHeight / 3.779528;

        // get max width of page
        $logoMaxWidth = $this->w - $this->lMargin - $this->rMargin - 3;
        // fix logo Max height
        $logoMaxHeight = 14;

        // get ratio logo
        $ratioMax = $logoMaxWidth / $logoMaxHeight;
        $ratioLogo = $imgWidth / $imgHeight;
        if ($logoWMm > $logoMaxWidth || $logoHMm > $logoMaxHeight) {
            if ($ratioLogo > $ratioMax) {
                $logoMaxHeight = $logoMaxWidth / $ratioLogo;
            } else {
                $logoMaxWidth = $logoMaxHeight * $ratioLogo;
            }
        } else {
            $logoMaxWidth = $logoWMm;
            $logoMaxHeight = $logoHMm;
        }
        return array($logoMaxWidth, $logoMaxHeight);
    }

    /**
     * Draw table Header
     * @param $header
     * @param $w
     */
    private function addTableHeader($header, $w)
    {
        // Colors, line width and bold font
        $this->SetFillColor(216, 216, 216);
        $this->SetTextColor(0);
        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(.3);
        $this->SetFont('', 'B', 9);
        // Header
        for ($i = 0; $i < count($header); $i++) {
            if ($i == 0) {
                $this->Cell($w[0] + $w[1], 9, $header[1], 'TL', 0, 'C', 1);
            } elseif ($i == 1) {
                continue;
            } elseif ($i == count($header) - 1) {
                $currentX = $this->x;
                $this->Cell($w[$i], 6, $header[$i], 'TR', 0, 'L', 1);
                $this->y += 5;
                $this->x = $currentX;
                $this->Cell($w[$i], 4, '(税込)', 'R', 0, 'L', 1);

            } elseif ($i == count($header) - 4) {
                $this->Cell($w[$i], 9, $header[$i], 'T', 0, 'C', 1);

            } else {
                $this->Cell($w[$i], 9, $header[$i], 'T', 0, 'L', 1);
            }
        }
        $this->Ln();
        $this->Cell($w[$i], 1.2, '', 'LRTB', 0, 'C', 0);
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(235, 235, 235);
        $this->SetTextColor(0);
        $this->SetFont('', '', 9);
    }

    /**
     * Calculating the height of next product
     * @param $w
     * @param $h
     * @param $txt
     * @param int $border
     * @param string $align
     * @param bool $fill
     * @return int
     */
    private function calculateHeightOfMultiCell($w, $h, $txt, $border = 0, $align = 'L', $fill = false)
    {
        $height = 0;
        $this->y = 50;
        // Output text with automatic or explicit line breaks
        $cw =& $this->CurrentFont['cw'];
        if ($w == 0)
            $w = $this->w - $this->rMargin - $this->x;
        $wmax = ($w - 2 * $this->cMargin) * 1000 / ($this->FontSize - 1);
        $s = str_replace("\r", '', $txt);
        $nb = strlen($s);
        if ($nb > 0 && $s[$nb - 1] == "\n")
            $nb--;
        $b = 0;
        if ($border) {
            if ($border == 1) {
                $border = 'LTRB';
                $b = 'LRT';
                $b2 = 'LR';
            } else {
                $b2 = '';
                if (is_int(strpos($border, 'L')))
                    $b2 .= 'L';
                if (is_int(strpos($border, 'R')))
                    $b2 .= 'R';
                $b = is_int(strpos($border, 'T')) ? $b2 . 'T' : $b2;
            }
        }
        $sep = -1;
        $i = 0;
        $j = 0;
        $l = 0;
        $nl = 1;
        while ($i < $nb) {
            // Get next character
            $c = $s[$i];
            $o = ord($c);
            if ($o == 10) {
                // Explicit line break
                $height += $h;
                $i++;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
                if ($border && $nl == 2)
                    $b = $b2;
                continue;
            }
            if ($o < 128) {
                // ASCII
                $l += $cw[$c];
                $n = 1;
                if ($o == 32)
                    $sep = $i;
            } elseif ($o >= 161 && $o <= 223) {
                // Half-width katakana
                $l += 500;
                $n = 1;
                $sep = $i;
            } else {
                // Full-width character
                $l += 1000;
                $n = 2;
                $sep = $i;
            }
            if ($l > $wmax) {
                // Automatic line break
                if ($sep == -1 || $i == $j) {
                    if ($i == $j)
                        $i += $n;
                    $height += $h;
                } else {
                    $height += $h;
                    $i = ($s[$sep] == ' ') ? $sep + 1 : $sep;
                }
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
                if ($border && $nl == 2)
                    $b = $b2;
            } else {
                $i += $n;
                if ($o >= 128)
                    $sep = $i;
            }
        }
        // Last chunk
        if ($border && is_int(strpos($border, 'B')))
            $b .= 'B';
        $height += $h;
        return $height;
    }
}