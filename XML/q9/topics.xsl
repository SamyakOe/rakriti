<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
        <html>
            <head>
                <style>
                    body {
                    font-family: Arial, sans-serif;
                    text-align: center;
                    }
                    h1 {
                    background-color: green;
                    color: white;
                    padding: 5px;
                    margin: 0;
                    }
                    table {
                    width: 80%;
                    margin: auto;
                    border-collapse: collapse;
                    }
                    td {
                    border: 1px solid lightgray;
                    padding: 5px;
                    text-align: center;
                    }
                    h2 {
                    color: green;
                    text-decoration: underline;
                    }
                    .item:nth-child(1) { color: green; }
                    .item:nth-child(2) { color: lightgreen; }
                    .item:nth-child(3) { color: red; }
                    .item:nth-child(4) { color: orange; }
                    .item:nth-child(5) { color: blue; }
                </style>
            </head>
            <body>
                <h1><xsl:value-of select="topics/title" /></h1>
                <table>
                    <xsl:for-each select="topics/category">
                        <tr>
                            <td>
                                <h2><xsl:value-of select="@name" /></h2>
                                <xsl:for-each select="item">
                                    <div class="item"><xsl:value-of select="." /></div>
                                </xsl:for-each>
                            </td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>