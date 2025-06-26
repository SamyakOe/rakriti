<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:template match="/">
        <html>
            <head>
                <title>Book List</title>
                <style>
                    table { border-collapse: collapse; width: 90%; margin: auto; font-family: Arial;}
                    th, td { border: 1px solid #999; padding: 8px; text-align: left; }
                    th { background-color: #f2f2f2; }
                    h2 { text-align: center; }
                </style>
            </head>
            <body>
                <h2>Book List</h2>
                <table>
                    <tr>
                        <th>Title</th>
                        <th>Year</th>
                        <th>Author(s)</th>
                        <th>Editor</th>
                        <th>Publisher</th>
                        <th>Price</th>
                    </tr>
                    <xsl:for-each select="bib/book">
                        <tr>
                            <td><xsl:value-of select="title" /></td>
                            <td><xsl:value-of select="@year" /></td>
                            <td>
                                <xsl:for-each select="author">
                                    <xsl:value-of select="." />
                                    <xsl:if test="position() != last()">, </xsl:if>
                                </xsl:for-each>
                            </td>
                            <td>
                                <xsl:if test="editor">
                                    <xsl:value-of select="editor/text()" />
                                </xsl:if>
                            </td>
                            <td><xsl:value-of select="publisher" /></td>
                            <td><xsl:value-of select="price" /></td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>