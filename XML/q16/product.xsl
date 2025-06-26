<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
  <xsl:output method="html" indent="yes" />
  <xsl:template match="/products">
    <html>
      <head>
        <title>Grouped Products</title>
        <style>
          table {border-collapse: collapse; width: 70%;}
          th, td {border: 1px solid #ccc; padding: 8px; text-align: left;}
          th {background-color: #eee;}
        </style>
      </head>
      <body>
        <h2>Grouped Products (Quantity ≥ 10)</h2>
        <xsl:for-each select="product[quantity &gt;= 10][not(category = preceding-sibling::product[quantity &gt;= 10]/category)]">
          <h3><xsl:value-of select="category"/></h3>
          <table>
            <tr>
              <th>Product Name</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Total Price</th>
            </tr>
            <xsl:for-each select="/products/product[quantity &gt;= 10 and category = current()/category]">
              <xsl:sort select="price" data-type="number" order="descending"/>
              <tr>
                <td><xsl:value-of select="productname"/></td>
                <td><xsl:value-of select="price"/></td>
                <td><xsl:value-of select="quantity"/></td>
                <td><xsl:value-of select="price * quantity"/></td>
              </tr>
            </xsl:for-each>
          </table>
        </xsl:for-each>
      </body>
    </html>
  </xsl:template>
</xsl:stylesheet>
