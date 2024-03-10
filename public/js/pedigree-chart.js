import * as d3 from "https://d3js.org/d3.v6.min.js";

function initializePedigreeChart(selector) {
  const svg = d3.select(selector).append("svg")
    .attr("width", 960)
    .attr("height", 500)
    .append("g")
    .attr("transform", "translate(40,0)");

  const tree = d3.tree().size([400, 400]);

  // Mock data for demonstration
  const data = {
    name: "Parent",
    children: [
      {
        name: "Child 1",
        children: [
          { name: "Grandchild 1" },
          { name: "Grandchild 2" }
        ]
      },
      {
        name: "Child 2",
        children: [
          { name: "Grandchild 3" },
          { name: "Grandchild 4" }
        ]
      }
    ]
  };

  const root = d3.hierarchy(data);
  tree(root);

  svg.selectAll(".link")
    .data(root.links())
    .enter().append("path")
    .attr("class", "stroke-current text-gray-500")
    .attr("fill", "none")
    .attr("d", d3.linkHorizontal()
      .x(d => d.y)
      .y(d => d.x));

  svg.selectAll(".node")
    .data(root.descendants())
    .enter().append("g")
    .attr("class", "node")
    .attr("transform", d => `translate(${d.y},${d.x})`);

  svg.selectAll(".node")
    .append("circle")
    .attr("r", 10)
    .attr("class", "fill-current text-blue-500");

  svg.selectAll(".node")
    .append("text")
    .attr("dy", 3)
    .attr("x", d => d.children ? -12 : 12)
    .style("text-anchor", d => d.children ? "end" : "start")
    .text(d => d.data.name);
}

export { initializePedigreeChart };
