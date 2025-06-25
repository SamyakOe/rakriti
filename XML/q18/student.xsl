<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="html" indent="yes" />
    <xsl:template match="/students">
        <html>
            <head>
                <title>Students Marks Report</title>
                <style>
                    body { font-family: Arial, sans-serif; margin: 20px; }
                    table { border-collapse: collapse; width: 70%; margin-bottom: 30px; }
                    th, td { border: 1px solid #666; padding: 8px; text-align: center; }
                    th { background-color: #eee; }
                    h2 { color: #333; }
                </style>
            </head>
            <body>
                <h2>Students Marks Report</h2>
                <xsl:for-each select="student">
                    <table>
                        <tr><th colspan="2">Student Details</th></tr>
                        <tr>
                            <td>Name</td>
                            <td><xsl:value-of select="name" /></td>
                        </tr>
                        <tr>
                            <td>Registration No</td>
                            <td><xsl:value-of select="reg_no" /></td>
                        </tr>
                        <tr>
                            <td>Symbol Number</td>
                            <td><xsl:value-of select="symbol_number" /></td>
                        </tr>
                        <tr><th colspan="2">Marks</th></tr>
                        <xsl:for-each select="marks/*">
                            <tr>
                                <td><xsl:value-of select="name()" /></td>
                                <td><xsl:value-of select="." /></td>
                            </tr>
                        </xsl:for-each>
                        <tr>
                            <td><strong>Total Marks</strong></td>
                            <td><strong><xsl:value-of select="sum(marks/*)" /></strong></td>
                        </tr>
                        <tr>
                            <td><strong>Percentage</strong></td>
                            <td>
                                <strong><xsl:value-of
                                        select="format-number(sum(marks/*) div 500 * 100, '0')" />% </strong>
                            </td>
                        </tr>
                    </table>
                </xsl:for-each>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>