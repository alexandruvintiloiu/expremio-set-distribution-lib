> Given balls *n\*n* balls of n colors with a random color distribution.

> Decide if possible and present the algorithm with which the balls were distributed into groups containing n groups of n balls, each containing a maximum of *2* colors. Groups of *one* color are also permitted.

The problem at hand doesn't have to be implemented with a single purpose. 
This can be abstracted to a set of n object with a set of specific attributes.
Since the objects do not have to be identified individually the concept can be abstracted.
For this reason this repository will contain only the ball distribution logic.

Since its should be in the scope of the library client to implement the data specific part of the distribution, this library will focus on only providing some infrastructure.
We have no use for individual objects so that these will not be modeled in this database, only interface-level abstractions will be provided to its clients.

#CountedSet
A **CountedSet** primitive is required to provide the storage and operations for the core concept around this library.

